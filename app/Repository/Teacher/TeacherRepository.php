<?php

namespace App\Repository\Teacher;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

    // Show all teachers
    public function index()
    {
        $teachers = $this->getAllTeachers();
        return view('teachers.index',['teachers' => $teachers]);
    }

    // create new teacher
    public function create()
    {
        $genders = $this->getAllGenders();
        $specializations = $this->getAllSpecializations();
        return view('teachers.create' , [
            'genders' => $genders,
            'specializations' => $specializations
        ]);
    }

    // store new teacher in DB
    public function store($request)
    {
        try{
            Teacher::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
                'specialization_id' => $request->specialization_id,
                'gender_id' => $request->gender_id,
                'joining_date' => $request->joining_date,
                'address' => $request->address,
            ]);

            return redirect()->back()->withSuccess(__('messages.success'));

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Edit teacher
    public function edit($teacher)
    {
        $specializations = $this->getAllSpecializations();
        $genders = $this->getAllGenders();
        return view('teachers.edit',[
            'specializations' => $specializations,
            'genders' => $genders,
            'teacher' => $teacher
        ]);
    }

    // update teacher
    public function update($request, $teacher)
    {
        try{
            $teacher->update([
                'email' => $request->email,
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
                'specialization_id' => $request->specialization_id,
                'gender_id' => $request->gender_id,
                'joining_date' => $request->joining_date,
                'address' => $request->address
            ]);

            return redirect()->back()->withSuccess(__('messages.update'));
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Delete teacher
    public function delete($teacher)
    {
        try{
            $teacher->delete();
            return redirect()->back()->withError(__('messages.delete'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
    }

    // get all teachers from DB
    public function getAllTeachers(){
        return Teacher::all();
    }

    // // get all genders from DB
    public function getAllGenders()
    {
        return Gender::all();
    }

    // // get all specializations from DB
    public function getAllSpecializations()
    {
        return Specialization::all();
    }
}