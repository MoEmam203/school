<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index',['grades'=>$grades]);
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
    public function store(GradeRequest $request)
    {
        if(Grade::where('name->ar',$request->name_ar)->orWhere('name->en',$request->name_en)->exists()){
            return redirect()->back()->withError(__('messages.exists'));
        }

        try{
            $grade = new Grade;
            $grade->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $grade->notes = $request->notes;
            $grade->save();

            return redirect()->back()->withSuccess(__('messages.success'));
        }
        catch(\Throwable $e){
            report($e);
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(GradeRequest $request, Grade $grade)
    {
        // if(Grade::where('id','!=',$grade->id)->where('name->ar',$request->name_ar)->orWhere('name->en',$request->name_en)->exists()){
        //     return redirect()->back()->withError(__('messages.exists'));
        // }

        try{
            $grade->update([
                'name' => ['en' => $request->name_en , 'ar' => $request->name_ar],
                'notes' => $request->notes
            ]);

            return redirect()->back()->withSuccess(__('messages.update'));
        }
        catch(\Throwable $e){
            report($e);
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        try{
            $grade->delete();
            return redirect()->back()->withError(__('messages.delete'));
        }
        catch(\Throwable $e){
            report($e);
            return false;
        }
    }
}
