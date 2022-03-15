<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MyParent extends Model
{
    use HasFactory,HasTranslations;

    protected $table = 'my_parents';
    public $translatable = ['father_name','father_job','mother_name','mother_job'];
    protected $guarded = [];

    public function attachments(){
        return $this->hasMany(ParentAttachment::class,'parent_id','id');
    } 
}
