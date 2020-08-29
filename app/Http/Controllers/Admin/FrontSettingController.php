<?php

namespace App\Http\Controllers\Admin;

use App\Aboutinfo;
use App\Homeinfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newsletter;
use App\Popup;
use App\Termsinfo;

class FrontSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function aboutInfo(Request $request){
        if($request->isMethod('post')){
            $info = Aboutinfo::where('id',1)->first();
            $info->detail = $request->detail;

            if($request->has('signature')){
                unlink(public_path('front/images/info/'.$info->signature));
                $imageName = time().'.'.$request->signature->getClientOriginalExtension();
                $request->signature->move(public_path('front/images/info'), $imageName);
                $info->signature = $imageName;
                }
                if($request->has('image')){
                    unlink(public_path('front/images/info/'.$info->image));
                    $imageName = time().'.'.$request->image->getClientOriginalExtension();
                    $request->image->move(public_path('front/images/info'), $imageName);
                    $info->image = $imageName;
                    }
                    $info->save();
                    return redirect()->back()->with('success','Info has been updated successfully!');
        }else{
            $info = Aboutinfo::where('id',1)->first();
            return view('back.front_setting.about_info',compact('info'));
        }
    }

    public function termsAndConditionInfo(Request $request){
        if($request->isMethod('post')){
            Termsinfo::where('id',1)->update(['terms' => $request->terms]);
            return redirect()->back()->with('success','Terms & Condition info has been updated successfully!');
        }else{
            $info = Termsinfo::where('id',1)->first();
            return view('back.front_setting.terms_info',compact('info'));
        }
    }

    public function basicInfo(Request $request){
        if($request->isMethod('post')){
            $info = Homeinfo::where('id',1)->first();
            if($request->has('logo')){
                unlink(public_path('front/images/info/'.$info->logo));
                $imageName = time().'.'.$request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('back/images/brand'), $imageName);
                $info->logo = $imageName;
                }
                $info->short_detail = $request->short_detail;
                $info->phone = $request->phone;
                $info->address = $request->address;
                $info->email = $request->email;
                $info->product_top = $request->product_top;
                $info->product_bottom = $request->product_bottom;
                $info->clearance = $request->clearance;
                $info->save();
                return redirect()->back()->with('success','Basic info has been updated successfully!');
        }else{
            $info = Homeinfo::where('id',1)->first();
            return view('back.front_setting.basic_info',compact('info'));
        }
    }

    public function popupBoxInfo(Request $request){
        if($request->isMethod('post')){
            $pop = Popup::where('id',1)->first();
            if($request->has('image')){
                unlink(public_path('front/images/info/'.$pop->image));
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('front/images/info'), $imageName);
                $pop->image = $imageName;
                }
            $pop->title = $request->title;
            $pop->short_detail = $request->short_detail;
            $pop->save();
            return redirect()->back()->with('success','Popup info has been updated successfully!');
        }else{
            $pop = Popup::where('id',1)->first();
            return view('back.front_setting.popup_info',compact('pop'));
        }
    }
}
