<?php

namespace App\Http\Controllers;

use App\Http\Requests\GraduateStudentsRequest;
use App\Models\Student;
use App\Repository\Student\Graduated\GraduatedStudentRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    public $graduated;
    public function __construct(GraduatedStudentRepositoryInterface $graduated)
    {
        $this->graduated = $graduated;
    }

    public function index()
    {
        return $this->graduated->index();
    }

    public function create()
    {
        return $this->graduated->create();
    }

    public function store(GraduateStudentsRequest $request)
    {
        return $this->graduated->store($request);
    }

    public function show($id)
    {
        return $this->graduated->show($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request,$id)
    {
        return $this->graduated->update($request,$id);
    }

    public function destroy($id)
    {
        return $this->graduated->destroy($id);
    }

    public function graduateStudent(Request $request,Student $student){
        return $this->graduated->graduateStudent($request,$student);
    }
}
