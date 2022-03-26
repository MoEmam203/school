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
        //
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
        //
    }

    
    public function update(Request $request, Student $student)
    {
        //
    }

    public function destroy(Student $student)
    {
        //
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
