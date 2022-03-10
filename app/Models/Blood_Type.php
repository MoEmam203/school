<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood_Type extends Model
{
    use HasFactory;

    protected $table = 'blood__types';
    protected $fillable = ['name'];
}
