<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function products($nameTypeProduct, $nameProduct)
    {
        return view('Products.detailProducts');
    }
}
