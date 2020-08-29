<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //
    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
    public function productCount(){
        return \App\Product::where('category_id',$this->id)->count();
    }

    public function subcat(){
        return $this->hasMany(Category::class,'parent_id');
    }

    public function parent()
        {
            if($this->parent_id==0){
                return NULL;
            }else{
                return Category::where('id',$this->parent_id)->first();
            }
        }

    public function getName(){
        if($this->parent_id==0){
            return $this->name;
        }else{
            $p=$this->parent();
            if($p->parent_id==0){
                return $p->name.' >> '.$this->name;
            }else{
                $pp=$p->parent();
                return $pp->name.' >> '.$p->name.' >> '.$this->name;
            }
        }
    }
}
