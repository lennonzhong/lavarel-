<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class userDetail extends Model
{
    protected $table='user_info';
    public $primaryKey='user_id';
    public $timestamps=false;
    protected $guarded=[];
}
