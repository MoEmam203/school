<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'grades';
    public $translatable = ['name'];
    protected $fillable = [
        'name' , 'notes'
    ];

    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }
}
