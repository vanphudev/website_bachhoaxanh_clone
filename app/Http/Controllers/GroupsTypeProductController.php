<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GroupsTypeProductController extends Controller
{
    public function groupsTypeProducts($nameGroupTypeProduct)
    {

        return view('GroupsTypeProduct.detailGroupsTypeProducts');
    }

    public function index()
    {

    }
}
