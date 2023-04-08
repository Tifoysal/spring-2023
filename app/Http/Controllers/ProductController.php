<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list()
    {
        $products=Product::with('category')->get();
//dd($products);
        return view('admin.pages.product.list',compact('products'));
    }

    public function createForm()
    {
        $categories=Category::all();

        return view('admin.pages.product.create',compact('categories'));
    }

    public function store(Request $request)
    {

//        $request->validate([
//           'product_name' =>'required',
//           'product_price' =>'required'
//        ]);

        $validate=Validator::make($request->all(),[
            'product_name' =>'required',
           'product_price' =>'required',
           'product_qty' =>'required|numeric|gt:0',
           'category_id' =>'required',
        ]);
        if($validate->fails())
        {
            notify()->error($validate->getMessageBag());
//            notify()->error("Somethings went wrong.");
            return redirect()->back();
        }

        $fileName='';
        if($request->hasFile('product_image'))
        {
            $fileName=date('Ymdhis').'.'.$request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->storeAs('/uploads',$fileName);
        }


       Product::create([
          'name'=>$request->product_name,
           'category_id'=>$request->category_id,
           'price'=>$request->product_price,
           'quantity'=>$request->product_qty,
           'description'=>$request->description,
           'image'=>$fileName
       ]);
        notify()->success('Product Created.');
       return redirect()->route('product.list');
    }

    public function view($id)
    {
        $product=Product::find($id);
        return view('admin.pages.product.view',compact('product'));
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        notify()->success('Product deleted.');
        return redirect()->back();
    }
}
