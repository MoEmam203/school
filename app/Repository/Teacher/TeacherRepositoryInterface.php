<?php

namespace App\Repository\Teacher;

interface TeacherRepositoryInterface{
    
    // Show all teachers
    public function index();

    // create teacher
    public function create();

    // store new teacher in DB
    public function store($request);

    // Edit teacher
    public function edit($teacher);

    // Update teacher
    public function update($request,$teacher);

    // Delete Teacher
    public function delete($teacher);
    
    // get all teachers from DB
    public function getAllTeachers();

    // get all specializations from DB
    public function getAllSpecializations();

    // get all Genders from DB
    public function getAllGenders();

}