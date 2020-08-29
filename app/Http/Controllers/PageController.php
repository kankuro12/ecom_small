<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class PageController extends Controller
{
    public function aboutUs(){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        return view('front.page.about',compact('cats'));
    }

    public function contactUs(){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        return view('front.page.contact',compact('cats'));
    }

    public function termsAndCondition(){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        return view('front.page.terms&condition',compact('cats'));
    }
}
