<?php 

namespace App\Repository\Student;

use App\Models\Blood_Type;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface{

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
        try{
            Student::create([
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

            return redirect()->back()->withSuccess(__('messages.success'));
        }catch(\Exception $e){
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