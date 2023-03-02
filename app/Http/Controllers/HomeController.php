<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('admin.pages.dashboard');
    }


    public function category()
    {
        return view('admin.pages.category');
    }

    public function aboutUs()
    {

       return view('about');
    }


}
