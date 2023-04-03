<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $categories=Category::all();
        $products=Product::all();
        return view('website.pages.home',compact('categories','products'));
    }
}
