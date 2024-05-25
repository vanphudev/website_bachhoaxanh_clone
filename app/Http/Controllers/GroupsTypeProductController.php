<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GroupsTypeProductController extends Controller
{
    public function groupsTypeProducts($nameGroupTypeProduct)
    {
        if (isset($nameGroupTypeProduct)) {
            $arr = explode('--', $nameGroupTypeProduct);
            if (count($arr) != 2) {
                return "Lỗi ";
            }
            $nameGroupTypeProduct = ($arr[0]);
            $idGroupTypeProduct = strtoupper($arr[1]);
            if (isset($idGroupTypeProduct) && isset($nameGroupTypeProduct)) {
                $TypeGroup = DB::table('nhom_loai_mathang')->where('nhom_loai_mathang.MANHOM_LOAI', $idGroupTypeProduct)->get();
                if ($TypeGroup->count() > 0) {
                    $firstGroupTypeGroup = $TypeGroup->first();
                    if (isset($firstGroupTypeGroup->TENNHOM_LOAI) && (convertVietnamese($firstGroupTypeGroup->TENNHOM_LOAI) == $nameGroupTypeProduct)) {
                        return view('GroupsTypeProduct.detailGroupsTypeProducts', compact('firstGroupTypeGroup'));
                    }
                }
            }
        }
        return "Không có tham số truyền vào";
    }

    public function index()
    {
    }
}
