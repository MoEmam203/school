<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialization extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'specializations';
    public $translatable = ['name'];
    protected $fillable = ['name'];
}
