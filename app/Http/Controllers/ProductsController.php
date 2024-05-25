<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function products($nameProduct)
    {
        if (isset($nameProduct)) {
            $arr = explode('--', $nameProduct);
            if (count($arr) != 2 || !isset($arr)) {
                return "Lỗi !";
            }
            $nameProduct = ($arr[0]);
            $idProduct = strtoupper($arr[1]);
            if (isset($idProduct) && isset($nameProduct)) {
                $Product = DB::table('mat_hang')->where('mat_hang.MAMH', $idProduct)->get();
                if ($Product->count() > 0) {
                    $firstProduct = $Product->first();
                    if (isset($firstProduct->TENMH) && (convertVietnamese($firstProduct->TENMH) == $nameProduct)) {
                        return view('Products.detailProducts', compact('firstProduct'));
                    }
                }
            }
        }
        return "Lỗi - Không có tham số truyền vào";
    }
}
