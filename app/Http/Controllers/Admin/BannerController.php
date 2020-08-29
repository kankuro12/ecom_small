<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index(){
        return view('back.banner.index');
    }

    public function topBanner(Request $request,$id){
        if($request->isMethod('post')){
            $banner = Banner::where('id',$id)->first();
            $banner->sub_title = $request->sub_title;
            $banner->title = $request->title;
            $banner->button_name = $request->button_name;
            $banner->link = $request->link;

            if($request->has('image')){
                unlink(public_path('back/images/banner/'.$banner->image));
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('back/images/banner'), $imageName);
                $banner->image = $imageName;
                }
                $banner->save();
                return redirect()->back()->with('success','Banner Update successfully!');
        }else{
            $banner = Banner::where('id',$id)->first();
            return view('back.banner.edit',compact('banner'));
        }
    }
}
