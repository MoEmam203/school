<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'teachers';
    public $translatable = ['name'];
    protected $guarded = [];
}
