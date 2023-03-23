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
        $bag=Category::paginate(10);
        return view('admin.pages.category.list',compact('bag'));
    }

    public function aboutUs()
    {

       return view('about');
    }


}
