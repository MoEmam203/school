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