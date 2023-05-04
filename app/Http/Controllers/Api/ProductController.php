<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products=Product::where('price','>=','600')->get();
        return response()->json(['data'=>$products]);
    }
}
