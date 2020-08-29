<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Post;
use App\Category;
use App\Collect;

class FrontController extends Controller
{


    public function index(){
        $cats = Category::with('subcat')->where('parent_id',0)->get();
        $category = Category::inRandomOrder()->take(4)->get();
        return view('front.index',compact('cats','category'));
    }


}
