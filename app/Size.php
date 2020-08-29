<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Size extends Model
{
    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_size');
    }

}
