<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        echo "welcome to our bootcamp";
    }

    public function aboutUs()
    {
        echo "welcome to our about us";
    }

    public function contact()
    {
        echo "welcome to our contact us";
    }
}
