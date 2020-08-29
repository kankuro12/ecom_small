<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsemessage extends Model
{
    protected $fillable =['message','order_id','created_at','updated_at'];
}
