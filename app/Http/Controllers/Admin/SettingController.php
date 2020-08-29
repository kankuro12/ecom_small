<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newsletter;
use App\Social;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    public function changePassword(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'new_password' => 'required|string|min:8|confirmed',
            ]);
            $user = User::where('id',Auth::user()->id)->where('role',1)->first();
            if(Hash::check($request->current_password, $user->password)){
                 $pass = bcrypt($request->new_password);
                 $user->update(['password' => $pass]);
                 return redirect()->back()->with('success','New passwrod has been changed successfully!');
            }else{
                return redirect()->back()->with('warning','Current password does not match!');
            }
           
        }else{
            $user = User::where('id',Auth::user()->id)->where('role',1)->first();
            return view('back.setting.change_password')->with(compact('user'));
        }
    }

    public function socialMedia(Request $request){
        if($request->isMethod('post')){
            Social::where('id',1)->update([
                'facebook' => $request->facebook,
                'twiter' => $request->twiter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
            ]);
            return redirect()->back()->with('success','Social media links have been updated successfully!');
        }else{
            $social = Social::where('id',1)->first();
            return view('back.setting.social',compact('social'));
        }
    }

    public function subscriber(){
        $subs = Newsletter::latest()->paginate(20);
        return view('back.setting.subscriber')->with(compact('subs'));
    }
}
