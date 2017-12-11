<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='biye_user';
    public $primaryKey='user_id';
    public $timestamps=false;
    protected $guarded=[];
}
