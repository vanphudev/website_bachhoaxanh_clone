<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $str = "Hello, World!";
        return view('Home/index', compact('str'));
    }

    // public function index($nameGroupTypeProduct)
    // {
    //     $str = "Hello, World!" . $nameGroupTypeProduct;
    //     return view('Home/index', compact('str'));
    // }
}
