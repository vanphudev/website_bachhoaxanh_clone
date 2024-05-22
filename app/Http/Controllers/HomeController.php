<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class HomeController extends Controller
{
    public function index()
    {
        $users = DB::table('NHOM_LOAI_MATHANG')->get();
        if (count($users) < 0) {
            $str = 'Không có dữ liệu';
            return view('Home/index', compact('str'));
        } else {
            return view('Home/index', compact('users'));
        }
    }
}
