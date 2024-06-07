<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $key)
    {
        $sortAsc = null;
        $sortDesc = null;
        $filterBrand = null;
        $discount = null;
        if (isset($key)) {
            $sortAsc = $key->input('sortAsc');
            $sortDesc = $key->input('sortDesc');
            $filterBrand = $key->input('filterBrand');
            $discount = $key->input('discount');
        }
        $keySearch = $key->input('key');
        $result = DB::table('mat_hang')
            ->whereRaw("MATCH(TENMH, DONVITINH, MO_TA) AGAINST(? IN NATURAL LANGUAGE MODE)", $keySearch)
            ->get();
        if (isset($sortAsc)) {
            $result = DB::table('mat_hang')
                ->whereRaw("MATCH(TENMH, DONVITINH, MO_TA) AGAINST(? IN NATURAL LANGUAGE MODE)", $keySearch)
                ->select('mat_hang.*', DB::raw('calculate_final_price(mat_hang.MAMH) as FINAL_PRICE'))
                ->orderBy('FINAL_PRICE', 'asc')
                ->get();
        }
        if (isset($sortDesc)) {
            $result = DB::table('mat_hang')
                ->whereRaw("MATCH(TENMH, DONVITINH, MO_TA) AGAINST(? IN NATURAL LANGUAGE MODE)", $keySearch)
                ->select('mat_hang.*', DB::raw('calculate_final_price(mat_hang.MAMH) as FINAL_PRICE'))
                ->orderBy('FINAL_PRICE', 'desc')
                ->get();
        }
        if (isset($discount)) {
            $result = DB::table('mat_hang')
                ->join('giam_gia', 'mat_hang.MAMH', '=', 'giam_gia.MAMH')
                ->whereRaw("MATCH(TENMH, DONVITINH, MO_TA) AGAINST(? IN NATURAL LANGUAGE MODE)", $keySearch)
                ->select('mat_hang.*')
                ->orderBy('giam_gia.LAN_GIAM_GIA', 'desc')
                ->get();
        }
        if (isset($filterBrand)) {
            $result = DB::table('mat_hang')
                ->whereRaw("MATCH(TENMH, DONVITINH, MO_TA) AGAINST(? IN NATURAL LANGUAGE MODE)", $keySearch)
                ->where('MA_TH', $filterBrand)
                ->select('mat_hang.*')
                ->get();
        }
        $groupTypeProduct = $result->groupBy('MALOAI');
        $groupTypeProduct = DB::table('loai_mathang')->whereIn('MALOAI', $groupTypeProduct->keys())->get();
        $brand = $result->groupBy('MA_TH');
        $brand = DB::table('thuong_hieu')->whereIn('MA_TH', $brand->keys())->get();
        return view('Search.detailSearch', compact('result', 'keySearch', 'groupTypeProduct', 'brand', 'filterBrand', 'sortAsc', 'sortDesc', 'discount'));
    }
}
