<?php

namespace App\Repository\Student;

interface StudentRepositoryInterface{

    // show all student
    public function index();

    // create new student
    public function create();

    // store new student
    public function store($request);

    // Edit Student
    public function edit($student);

    // update Student
    public function update($request,$student);

    // delete Student
    public function destroy($student);

    // get all genders
    public function getAllGenders();
    
    // get all nationalities
    public function getAllNationalities();
    
    // get all blood types
    public function getAllBloodTypes();
    
    // get all grades
    public function getAllGrades();

    // get all parents
    public function getAllParents();
    
    // get Classrooms by grade id
    public function getClassrooms($id);

    // get sections by classroom id
    public function getSections($id);
}