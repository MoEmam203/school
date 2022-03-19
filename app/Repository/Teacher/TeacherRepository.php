<?php

namespace App\Repository\Teacher;

use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface{

    public function getAllTeachers()
    {
        return Teacher::all();
    }
}