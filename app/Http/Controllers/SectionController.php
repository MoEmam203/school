<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::with(['sections','classrooms'])->get();

        $teachers = Teacher::all();

        return view('sections.index',[
            'grades'=>$grades,
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        // return $request;
        try{
            // save Section into db
            $section = Section::create([
                'name' => ['en'=>$request->name_en,'ar'=>$request->name_ar],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id
            ]);

            $section->teachers()->attach($request->teachers_id);

            return redirect()->back()->withSuccess(__('messages.success'));

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, Section $section)
    {
        try{
            $section->update([
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'status' => $request->status ?? 0
            ]);

            // update pivot table
            if(isset($request->teachers_id)){
                $section->teachers()->sync($request->teachers_id);
            }else{
                $section->teachers()->sync(array());
            }

            return redirect()->back()->withSuccess(__('messages.update'));

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        try{
            $section->delete();
            return redirect()->back()->withError(__('messages.delete'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getClassrooms(Request $request,$id){
        return Classroom::where('grade_id', $id)->pluck('name','id');
    }
}
