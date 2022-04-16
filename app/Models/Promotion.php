<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';
    protected $guarded = [];

    public function student(){
        return $this->belongsTo(Student::class,'student_id')->withTrashed();
    }

    // Relations From
    public function f_grade(){
        return $this->belongsTo(Grade::class,'grade_from');
    }

    public function f_classroom(){
        return $this->belongsTo(Classroom::class,'classroom_from');
    }

    public function f_section(){
        return $this->belongsTo(Section::class,'section_from');
    }

    // Relations To
    public function t_grade(){
        return $this->belongsTo(Grade::class,'grade_to');
    }

    public function t_classroom(){
        return $this->belongsTo(Classroom::class,'classroom_to');
    }

    public function t_section(){
        return $this->belongsTo(Section::class,'section_to');
    }
}
