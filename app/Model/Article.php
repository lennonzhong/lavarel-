<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='blog_article';
    public $primaryKey='art_id';
    public $timestamps=false;
    protected $guarded=[];
}
