<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function orderitem(){
        return $this->hasMany(Orderitem::class);
    }

    public function date(){
        $date = \App\Order::where('id',$this->id)->first();
        $orderPlace = date('d-M-Y', strtotime($date->created_at));
        return $orderPlace;
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function receivedOrder(){
        return $this->created_at->diffForHumans();
     }
}
