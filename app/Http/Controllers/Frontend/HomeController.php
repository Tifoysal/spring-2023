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

    public function productsUnderCategory($id)
    {
        $category=Category::find($id);
        $products=Product::where('category_id','=',$id)->get();

        return view('website.pages.products-under-category',compact('products','category'));
    }

    public function productSearch(Request $request)
    {

        $products=Product::where('name','LIKE','%'.$request->search_key.'%')->get();

        return view('website.pages.search-list',compact('products'));
    }
}
