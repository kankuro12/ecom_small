<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    //

    public function colors(){
        return $this->belongsToMany(Color::class,'product_color');
    }

    public function sizes(){
        return $this->belongsToMany(Size::class,'product_size');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function images(){
        return $this->hasMany(Productimage::class,'product_id');

    }

    public function discount(){
        $p = \App\Product::where('id',$this->id)->first();
        $netloss = $p->price - $p->sales_price;
        $percent = ($netloss/$p->price)*100;
        return number_format($percent,2,'.',',');
    }

    public function newProduct(){
        $date = date('yy-m-d',strtotime($this->created_at));
        $newdate = date('yy-m-d',strtotime($date.'+1 month'));
        return $newdate;
    }

    public function withlistCount(){
        return \App\Wishlist::where('product_id',$this->id)->count();
    }

    public function withlistProductId(){
        
        if(Auth::user()->role == 0){
            $wishlist =  \App\Wishlist::where(['user_id' => Auth::user()->id])->get();
            $product=[];
            foreach ($wishlist as  $value) {
                $product_id = $value->product_id;
                array_push($product,$product_id);
            }
            // dd($product);
            foreach ($product as $key => $v) {
                if($v == $this->id){
                    return '<span class="btn-product-icon btn-wishlist text-white" style="background-color: #39f;"><sup>'.$this->withlistCount().'</sup></span>';
                }else{
                    return '<span class="btn-product-icon btn-wishlist"><sup>'.$this->withlistCount().'</sup></span>';
                }
            } 
        }
    }

}


