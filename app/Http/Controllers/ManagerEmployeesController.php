<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerEmployeesController extends Controller
{
    //
    public function index()
    {
        return view('ManagerEmployees.index');
    }
    public function create()
    {
        return view('ManagerEmployees.create');
    }
    public function edit()
    {
        return view('ManagerEmployees.edit');
    }
}