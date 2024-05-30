<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $key)
    {
        $keySearch = $key->input('key');
        $result = DB::table('mat_hang')
            ->whereRaw("MATCH(TENMH, DONVITINH, MO_TA) AGAINST(? IN NATURAL LANGUAGE MODE)", $keySearch)
            ->get();
        $groupTypeProduct = $result->groupBy('MALOAI');
        $groupTypeProduct = DB::table('loai_mathang')->whereIn('MALOAI', $groupTypeProduct->keys())->get();
        $brand = $result->groupBy('MA_TH');
        $brand = DB::table('thuong_hieu')->whereIn('MA_TH', $brand->keys())->get();
        return view('Search.detailSearch', compact('result', 'keySearch', 'groupTypeProduct', 'brand'));
    }
}
