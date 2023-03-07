<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCreateForm()
    {
        return view('admin.pages.category.create');
    }
}
