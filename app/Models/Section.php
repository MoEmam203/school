<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'sections';
    public $translatable = ['name'];
    protected $fillable = [
        'name' , 'status' , 'grade_id' , 'classroom_id'
    ];

    public function grades(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function classrooms(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
}
