<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='blog_category';
    public $primaryKey='cate_id';
    public $timestamps=false;
    protected $guarded=[];
}
