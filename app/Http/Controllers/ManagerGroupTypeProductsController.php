<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerGroupTypeProductsController extends Controller
{
    public function index()
    {
        return view('ManagerGroupTypeProducts.index');
    }

    public function create()
    {
        return view('ManagerGroupTypeProducts.create');
    }

    public function edit()
    {
        return view('ManagerGroupTypeProducts.edit');
    }
}
