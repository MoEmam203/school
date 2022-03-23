<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use App\Repository\Teacher\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public $teacher;

    public function __construct(TeacherRepositoryInterface $teacher)
    {
        $this->teacher = $teacher;
    }
    
    public function index()
    {
        return $this->teacher->index();
    }

    public function create()
    {
        return $this->teacher->create();
    }

    public function store(TeacherRequest $request)
    {
        return $this->teacher->store($request);
    }

    public function edit(Teacher $teacher)
    {
        return $this->teacher->edit($teacher);
    }

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        return $this->teacher->update($request,$teacher);
    }

    public function destroy(Teacher $teacher)
    {
        return $this->teacher->delete($teacher);
    }
}
