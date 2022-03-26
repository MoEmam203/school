<?php

namespace App\Repository\Student;

interface StudentRepositoryInterface{

    // create new student
    public function create();

    // store new student
    public function store($request);

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