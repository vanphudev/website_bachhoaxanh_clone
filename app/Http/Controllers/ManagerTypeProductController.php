<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ManagerTypeProductController extends Controller
{
    public function index()
    {
        // // Kiểm tra xem người dùng đã đăng nhập chưa.
        // if (!Cookie::get('user_Admin')) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ cookie.
        // $user_Admin = json_decode(Crypt::decryptString(Cookie::get('user_Admin')), true);
        // if (!$user_Admin) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ database.
        // $user = DB::table('nhanvien')->where('MANV', $user_Admin['id'])->first();

        // Lấy danh sách loại sản phẩm join với bảng nhóm sản phẩm.
        $type_products = DB::table('loai_mathang')
            ->join('nhom_loai_mathang', 'loai_mathang.MANHOM_LOAI', '=', 'nhom_loai_mathang.MANHOM_LOAI')
            ->select('loai_mathang.*', 'nhom_loai_mathang.*')
            ->get();
        return view('ManagerTypeProduct.index', ['type_products' => $type_products]);
    }
}
