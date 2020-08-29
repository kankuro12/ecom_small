<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function postImage(){
        return $this->hasMany(PostImage::class,'post_id');
    }

    public function date(){
        $date = $this->created_at;
        $publish = date('d-M-Y', strtotime($date));
        return $publish;
    }

    public function date1(){
       return $this->created_at->diffForHumans();
    }

    public function featuredImage(){
        return PostImage::where('featured',1)->where('post_id',$this->id)->first();
    }

    public function detail(){
        return \Parsedown::instance()->text($this->detail);
    }

    public function shortDetail(){
        return \Parsedown::instance()->text($this->shortdetail);
    }
}
