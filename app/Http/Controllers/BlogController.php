<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Category;

class BlogController extends Controller
{
    public function singleBlogDetail($id){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $blog = Blog::where('id',$id)->first();
        return view('front.blog.detail',compact('cats','blog'));
    }
}
