<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        $grades = Grade::all();
        return view('classrooms.index',['classrooms' => $classrooms,'grades' => $grades]);
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
    public function store(ClassroomRequest $request)
    {
        try{
            $classes = $request->List_Classes;
            foreach($classes as $class){
                $classroom = new Classroom;

                $classroom->name = ['ar' => $class['name_ar'] , 'en' => $class['name_en']];

                $classroom->grade_id = $class['grade_id'];

                $classroom->save();
            }

            return redirect()->back()->withSuccess(__('messages.success'));

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        try{
            $classroom->update([
                'name' => ['ar' => $request->name_ar , 'en' => $request->name_en],
                'grade_id' => $request->grade_id
            ]);

            return redirect()->back()->withSuccess(__('messages.update'));

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        try {
            $classroom->delete();
            return redirect()->back()->withError(__('messages.delete'));
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
