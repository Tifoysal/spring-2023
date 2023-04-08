<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {
        $products=Product::all()->count();
        return view('admin.pages.dashboard',compact('products'));
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

    public function login()
    {
        return view('admin.pages.login');
    }

    public function doLogin(Request $request)
    {
        $validate=Validator::make($request->all(),[
           'email'=>'required',
           'password'=>'required|min:5',
        ]);

        if($validate->fails())
        {
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        $credentials=$request->only(['email','password']);
        if(auth()->attempt($credentials)){
            notify()->success('Login Success');
            return redirect()->route('home');
        }
            notify()->error('Invalid Credentials');
            return redirect()->back();

    }

    public function logout()
    {
        auth()->logout();
        notify()->success('Logout Success.');
        return redirect()->route('login');
    }


}
