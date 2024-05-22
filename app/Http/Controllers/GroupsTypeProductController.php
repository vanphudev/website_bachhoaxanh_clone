<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupsTypeProductController extends Controller
{
    //
    //
    public function groupsTypeProducts($nameGroupTypeProduct)
    {
        return view('GroupsTypeProduct.detailGroupsTypeProducts');
    }

    public function index()
    {
        return view('GroupsTypeProduct.detailGroupsTypeProducts');
    }
}
