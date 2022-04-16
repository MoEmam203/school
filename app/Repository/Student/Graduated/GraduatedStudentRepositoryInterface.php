<?php

namespace App\Repository\Student\Graduated;

interface GraduatedStudentRepositoryInterface{
    // index => list all graduated students
    public function index();

    // show => display graduated student data
    public function show($id);

    // create => show form to graduate students
    public function create();

    // store => graduate students (softDelete)
    public function store($request);

    // update => return graduated student 
    public function update($request,$id);

    // destroy => remove graduated student data from DB
    public function destroy($id);

    // graduateStudent => Graduate one student from student list or promotions list
    public function graduateStudent($request,$student);
}