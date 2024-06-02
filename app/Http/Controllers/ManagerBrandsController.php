<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerBrandsController extends Controller
{
    //
    public function index()
    {
        return view('ManagerBrands.index');
    }
    public function create()
    {
        return view('ManagerBrands.create');
    }
    public function edit()
    {
        return view('ManagerBrands.edit');
    }
}