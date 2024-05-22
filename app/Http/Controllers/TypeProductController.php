<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    //
    //
    public function typeProducts($nameTypeProduct)
    {
        return view('TypeProduct.detailTypeProducts');
    }

    public function index()
    {
        return view('TypeProduct.detailTypeProducts');
    }
}
