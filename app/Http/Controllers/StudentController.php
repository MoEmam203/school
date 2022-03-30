<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Repository\Student\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public $student;

    public function __construct(StudentRepositoryInterface $student){
        $this->student = $student;
    }
    
    public function index()
    {
        return $this->student->index();
    }

    
    public function create()
    {
        return $this->student->create();
    }

    
    public function store(StudentRequest $request)
    {
        return $this->student->store($request);
    }

    
    public function show(Student $student)
    {
        //
    }


    public function edit(Student $student)
    {
        return $this->student->edit($student);
    }

    
    public function update(StudentRequest $request, Student $student)
    {
        return $this->student->update($request,$student);
    }

    public function destroy(Student $student)
    {
        return $this->student->destroy($student);
    }

    // get Classrooms by grade id
    public function getClassrooms($id){
        return $this->student->getClassrooms($id);
    }

    // get sections by classroom id
    public function getSections($id){
        return $this->student->getSections($id);
    }
}
