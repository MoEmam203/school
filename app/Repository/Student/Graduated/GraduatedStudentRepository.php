<?php

namespace App\Repository\Student\Graduated;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class GraduatedStudentRepository implements GraduatedStudentRepositoryInterface{
    // index => list all graduated students
    public function index(){
        $students = Student::onlyTrashed()->get();
        return view('students.graduated.index',[
            'students' => $students
        ]);
    }

    // create => graduate students
    public function create(){
        $grades = Grade::all();
        return view('students.graduated.create',[
            'grades' => $grades
        ]);
    }

    // store => graduate students (softDelete)
    public function store($request){
        DB::beginTransaction();
        try{
            $students = Student::where('grade_id', $request->grade_id)->
                            where('classroom_id', $request->classroom_id)->
                            where('section_id', $request->section_id)->
                            get();

            if(count($students) < 1){
                return redirect()->back()->withError(__('Students_trans.no_students'));
            }

            foreach ($students as $student) {
                $student->delete();
            }

            DB::commit();
            return redirect()->back()->withSuccess(__('messages.success'));
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // update => return graduated student 
    public function update($request,$id){
        $student = Student::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back()->withSuccess(__('messages.restore'));
    }

    // destroy => remove graduated student data from DB
    public function destroy($id){
        Student::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back()->withError(__('messages.delete'));
    }
}