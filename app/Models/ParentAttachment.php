<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{
    use HasFactory;

    protected $table = 'parent_attachments';
    protected $fillable = ['file_name','parent_id'];

    public function my_parent(){
        return $this->belongsTo(MyParent::class,'parent_id','id');
    }
}
