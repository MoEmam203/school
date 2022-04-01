<?php 

namespace App\Repository\Student;

use App\Models\Grade;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\MyParent;
use App\Models\Classroom;
use App\Models\Blood_Type;
use App\Models\Nationality;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface{

    // show all student
    public function index(){
        $students = Student::all();
        return view('students.index',[
            'students' => $students
        ]);
    }

    // create student
    public function create()
    {
        $genders = $this->getAllGenders();
        $nationalities = $this->getAllNationalities();
        $blood_types = $this->getAllBloodTypes();
        $grades = $this->getAllGrades();
        $parents = $this->getAllParents();
        return view('students.create',[
            'genders' => $genders,
            'nationalities' => $nationalities,
            'blood_types' => $blood_types,
            'grades' => $grades,
            'parents' => $parents,
        ]);
    }

    // store new student
    public function store($request){
        DB::beginTransaction();
        try{
            $student = Student::create([
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'date_of_birth' => $request->date_of_birth,
                'academic_year' => $request->academic_year,

                'gender_id' => $request->gender_id,
                'nationality_id' => $request->nationality_id,
                'blood_type_id' => $request->blood_type_id,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'parent_id' => $request->parent_id,
            ]);

            // if request has images
            if($request->hasFile('images')){
                foreach($request->file('images') as $image){
                    $name = $image->getClientOriginalName();

                    // store in DB
                    $student->images()->create([
                        'filename' => $name
                    ]);

                    // store in server
                    $image->storeAs('attachments/students/'.$student->id,$name,'upload_attachments');
                }
            }
            DB::commit();
            return redirect()->back()->withSuccess(__('messages.success'));
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // show student data
    public function show($student)
    {
        return view('students.show',['student' => $student]);
    }

    // Edit Student
    public function edit($student){
        $genders = $this->getAllGenders();
        $nationalities = $this->getAllNationalities();
        $blood_types = $this->getAllBloodTypes();
        $grades = $this->getAllGrades();
        $parents = $this->getAllParents();

        return view('students.edit',[
            'genders' => $genders,
            'nationalities' => $nationalities,
            'blood_types' => $blood_types,
            'grades' => $grades,
            'parents' => $parents,
            'student' => $student
        ]);
    }

    // update Student
    public function update($request,$student){
        try{
            $student->update([
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'academic_year' => $request->academic_year,

                'gender_id' => $request->gender_id,
                'nationality_id' => $request->nationality_id,
                'blood_type_id' => $request->blood_type_id,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'parent_id' => $request->parent_id,
            ]);

            return redirect()->back()->withSuccess(__('messages.update'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // delete Student
    public function destroy($student){
        try{
            // remove images from server
            File::deleteDirectory(public_path('/attachments/students/'.$student->id));

            // remove images form DB
            $student->images()->delete();

            // remove student
            $student->delete();
            return redirect()->back()->withError(__('messages.delete'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // upload attachments
    public function uploadAttachments($request,$student){
        try{
            // if request has images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $name = $image->getClientOriginalName();

                    // store in DB
                    $student->images()->create([
                        'filename' => $name
                    ]);

                    // store in server
                    $image->storeAs('attachments/students/'.$student->id, $name, 'upload_attachments');
                }
            }
            return redirect()->back()->withSuccess(__('messages.success'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Show attachment
    public function showAttachment($student,$filename){
        return response()->file(public_path('attachments/students/'.$student->id.'/'.$filename));
    }

    // Download Attachment
    public function downloadAttachment($student,$filename){
        return response()->download(public_path('attachments/students/'.$student->id.'/'.$filename));
    }

    // Delete Attachment
    public function deleteAttachment($student,$image){
        DB::beginTransaction();
        try{
            // delete from server
            File::delete(public_path('attachments/students/'.$student->id.'/'.$image->filename));

            // delete from DB
            $image->delete();

            // return back
            DB::commit();
            return redirect()->back()->withError(__('messages.delete'));
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // get all genders
    public function getAllGenders(){
        return Gender::all();
    }

    // get all nationalities
    public function getAllNationalities(){
        return Nationality::all();
    }

    // get all blood types
    public function getAllBloodTypes(){
        return Blood_Type::all();
    }

    // get all grades
    public function getAllGrades(){
        return Grade::all();
    }

    // get all parents
    public function getAllParents(){
        return MyParent::all();
    }

    // get Classrooms by grade id
    public function getClassrooms($id){
        return Classroom::where('grade_id',$id)->pluck('name','id');
    }

    // get sections by classroom id
    public function getSections($id){
        return Section::where('classroom_id',$id)->pluck('name','id');
    }
}