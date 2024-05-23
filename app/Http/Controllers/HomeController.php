<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $groupTypeProduct = DB::table('nhom_loai_mathang')->get();

        if (count($groupTypeProduct) < 1) {
            $str = false;
            return view('Home/index', compact('str'));
        } else {
            return view('Home/index', compact('groupTypeProduct'));
        }
    }
}
