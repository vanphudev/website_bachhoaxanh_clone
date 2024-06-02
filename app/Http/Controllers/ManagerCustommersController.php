<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerCustommersController extends Controller
{
    //
    public function index()
    {
        return view('ManagerCustommers.index');
    }
    public function create()
    {
        return view('ManagerCustommers.create');
    }
    public function edit()
    {
        return view('ManagerCustommers.edit');
    }
}