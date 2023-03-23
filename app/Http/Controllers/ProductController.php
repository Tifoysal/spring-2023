<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $products=Product::all();

        return view('admin.pages.product.list',compact('products'));
    }

    public function createForm()
    {
        $categories=Category::all();

        return view('admin.pages.product.create',compact('categories'));
    }

    public function store(Request $request)
    {

       Product::create([
          'name'=>$request->product_name,
           'category_id'=>$request->category_id,
           'price'=>$request->product_price,
           'quantity'=>$request->product_qty,
           'description'=>$request->description
       ]);

       return redirect()->route('product.list');
    }
}
