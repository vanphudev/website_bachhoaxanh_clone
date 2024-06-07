<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeProductController extends Controller
{
    //
    public function typeProducts($nameTypeProduct, Request $request)
    {
        $filterBrand = null;
        $sortAsc = null;
        $sortDesc = null;
        if (isset($request)) {
            $filterBrand = $request->input('filterBrand');
            $sortAsc = $request->input('sortAsc');
            $sortDesc = $request->input('sortDesc');
            $discount = $request->input('discount');
        }
        if (isset($nameTypeProduct)) {
            $arr = explode('--', $nameTypeProduct);
            if (count($arr) != 2) {
                return "Lỗi ";
            }
            $nameTypeProduct = ($arr[0]);
            $idTypeProduct = strtoupper($arr[1]);
            if (isset($idTypeProduct) && isset($nameTypeProduct)) {
                $TypeGroup = DB::table('loai_mathang')->where('loai_mathang.MALOAI', $idTypeProduct)->get();
                if ($TypeGroup->count() > 0) {
                    $firstTypeGroup = $TypeGroup->first();
                    if (isset($firstTypeGroup->TENLOAI) && (convertVietnamese($firstTypeGroup->TENLOAI) == $nameTypeProduct)) {
                        return view('TypeProduct.detailTypeProducts', compact('firstTypeGroup', 'filterBrand', 'sortAsc', 'sortDesc', 'discount'));
                    }
                }
            }
        }
        return "Không có tham số truyền vào";
    }

    public function index()
    {
        return view('TypeProduct.detailTypeProducts');
    }
}
