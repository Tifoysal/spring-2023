<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function userStore(Request $request)
    {
      $validate=Validator::make($request->all(),[
         'customer_name'=>'required',
         'customer_email'=>'required',
         'password'=>'required|confirmed',
         'password_confirmation'=>'required',
      ]);

      if($validate->fails())
      {
          notify()->error($validate->getMessageBag());
          return redirect()->back();
      }

      User::create([
          'name'=>$request->customer_name,
          'email'=>$request->customer_email,
          'password'=>bcrypt($request->password),
          'type'=>'customer',
      ]);

      notify()->success('Registration success.');
      return redirect()->back();
    }

    public function userLogin(Request $request)
    {
        $validate=Validator::make($request->all(),[
           'email'=>'required',
           'password'=>'required',
        ]);

        if($validate->fails())
        {
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        $credentials=$request->except('_token');
       if(auth()->attempt($credentials))
       {
           notify()->success('Login success');
           return redirect()->back();
       }
        notify()->error('Login failed');
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        notify()->warning('Logout Success');
        return redirect()->back();
    }

}
