<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{
    protected $table='replay';
    public $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];
}
