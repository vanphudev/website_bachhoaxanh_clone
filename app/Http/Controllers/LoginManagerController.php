<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginManagerController extends Controller
{
    public function index()
    {
        return view('LoginManager.index');
    }
}
