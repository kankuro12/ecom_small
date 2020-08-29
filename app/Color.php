<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function size(){
        return $this->hasMany(Size::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_color');
    }

    public function stocks(){
        return $this->hasMany(Stock::class,'color_id');
    }
}
