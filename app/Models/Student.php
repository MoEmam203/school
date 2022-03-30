<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'students';
    public $translatable = ['name'];
    protected $guarded = [];
    
    public function grade(){
        return $this->belongsTo(Grade::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
