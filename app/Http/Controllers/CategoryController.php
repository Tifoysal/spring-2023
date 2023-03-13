<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCreateForm()
    {
        return view('admin.pages.category.create');
    }

    public function store(Request $request)
    {
        Category::create([
            //table column name => input field name
            'name'=>$request->cat_name,
            'status'=>$request->status,
            'description'=>$request->description
        ]);

        return redirect()->back();

    }
}
