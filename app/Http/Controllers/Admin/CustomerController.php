<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    
    public function customerList(){
        $customers = User::where('role',0)->paginate(15);
        return view('back.customer.list',compact('customers'));
    }

    public function customerMessage(){
        return view('back.customer.message');
    }

    public function messageSeen($id){
    \App\Message::where('id',$id)->update(['status' => 1]);
    return redirect()->back()->with('success','Message has been seen !');
    }

    
}
