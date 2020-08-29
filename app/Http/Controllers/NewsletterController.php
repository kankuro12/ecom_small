<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;

class NewsletterController extends Controller
{

    public function addEmail(Request $request){
        if($request->ajax()){
            $emailCount = Newsletter::where('email',$request->email)->count();
            if($emailCount>0){
                echo 'exists';
            }else{
                $email = new Newsletter();
                $email->email = $request->email;
                $email->save();
                echo 'save';
            }
        }
    }
}
