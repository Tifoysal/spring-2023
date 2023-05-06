<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProducts()
    {
        try {
            $products=Product::all();
            return $this->responseWithSuccess($products,'All products are loaded.');
        }catch (\Throwable $exception)
        {
            return $this->responseWithError($exception,402);
        }
    }

    public function productStore(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'product_name' =>'required',
            'product_price' =>'required',
            'product_qty' =>'required|numeric|gt:0',
            'category_id' =>'required',
        ]);
        if($validate->fails())
        {
           return $this->responseWithError($validate->getMessageBag());
        }

        $fileName='';
        if($request->hasFile('product_image'))
        {
            $fileName=date('Ymdhis').'.'.$request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->storeAs('/uploads',$fileName);
        }


       $product= Product::create([
            'name'=>$request->product_name,
            'category_id'=>$request->category_id,
            'price'=>$request->product_price,
            'quantity'=>$request->product_qty,
            'description'=>$request->description,
            'image'=>$fileName
        ]);

        return $this->responseWithSuccess($product,'Product Created successfully.');

    }

}
