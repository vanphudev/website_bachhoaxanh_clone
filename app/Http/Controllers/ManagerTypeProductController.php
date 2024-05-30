<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerTypeProductController extends Controller
{
    public function index()
    {
        return view('ManagerTypeProductController.index');
    }
    public function create()
    {
        return view('ManagerTypeProductController.create');
    }
    public function edit()
    {
        return view('ManagerProductsManagerTypeProductController.edit');
    }
}