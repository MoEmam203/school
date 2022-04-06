<?php 

namespace App\Repository\Student\Promotions;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface{

    // index
    public function index()
    {
        $promotions = Promotion::all();
        return view('students.promotions.index',['promotions' => $promotions]);
    }

    // create
    public function create()
    {
        $grades = Grade::all();
        return view('students.promotions.create',[
            'grades' => $grades
        ]);
    }

    // store
    public function store($request)
    {
        DB::beginTransaction();
        try{
            $students = Student::where('grade_id',$request->grade_id)->
                                where('classroom_id',$request->classroom_id)->
                                where('section_id',$request->section_id)->
                                where('academic_year',$request->academic_year_from)->
                                get();
            
            foreach($students as $student){
                $student->update([
                    'grade_id' => $request->grade_id_new,
                    'classroom_id' => $request->classroom_id_new,
                    'section_id' => $request->section_id_new,
                    'academic_year' => $request->academic_year_to
                ]);

                Promotion::updateOrCreate([
                    'student_id' => $student->id,

                    'grade_from' => $request->grade_id,
                    'classroom_from' => $request->classroom_id,
                    'section_from' => $request->section_id,
                    'academic_year_from' => $request->academic_year_from,

                    'grade_to' => $request->grade_id_new,
                    'classroom_to' => $request->classroom_id_new,
                    'section_to' => $request->section_id_new,
                    'academic_year_to' => $request->academic_year_to
                ]);
            }

            DB::commit();
            return redirect()->back()->withSuccess(__('messages.success'));
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // rollback all promotions
    public function rollbackAllPromotions(){
        DB::beginTransaction();
        try{
            $promotions = Promotion::all();
            foreach($promotions as $promotion){
                $promotion->student->update([
                    'grade_id' => $promotion->grade_from,
                    'classroom_id' => $promotion->classroom_from,
                    'section_id' => $promotion->section_from,
                    'academic_year' => $promotion->academic_year_from,
                ]);
            }
            Promotion::truncate();
            DB::commit();
            return redirect()->back()->withSuccess(__('messages.success'));
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}