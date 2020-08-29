<?php

namespace App\Http\Controllers\Admin;

use App\Collect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index(){
        return view('back.index');
    }
}
