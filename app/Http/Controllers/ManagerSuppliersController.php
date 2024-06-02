<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerSuppliersController extends Controller
{
    //
    public function index()
    {
        return view('ManagerSuppliers.index');
    }
    public function create()
    {
        return view('ManagerSuppliers.create');
    }
    public function edit()
    {
        return view('ManagerSuppliers.edit');
    }
}