<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //

    public function size(){
        return $this->belongsTo(Size::class,'size_id');
    }

    public function color(){
        return $this->belongsTo(Color::class,'color_id');
    }
}
