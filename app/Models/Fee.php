<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'fees';
    protected $translatable = ['name'];
    protected $fillable = [
        'name' , 'amount' , 'description' , 'year' , 'grade_id' , 'classroom_id'
    ];

    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
}
