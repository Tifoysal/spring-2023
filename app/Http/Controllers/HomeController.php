<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('admin.pages.dashboard');
    }


    public function category()
    {
        $bag=Category::all();
        return view('admin.pages.category.list',compact('bag'));
    }

    public function aboutUs()
    {

       return view('about');
    }


}
