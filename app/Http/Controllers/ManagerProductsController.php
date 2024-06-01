<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerProductsController extends Controller
{
    public function index()
    {

        return view('ManagerProducts.index');
    }
}
