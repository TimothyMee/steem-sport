<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('v1.home');
    }

    public function newPost()
    {
        return view('v1.new-post');
    }

    public function userProfile()
    {
        return view('v1.user-profile');
    }
}
