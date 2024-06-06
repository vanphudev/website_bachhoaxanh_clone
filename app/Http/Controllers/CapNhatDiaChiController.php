<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;

class CapNhatDiaChiController extends Controller
{
    public function index()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa.
        if (!Cookie::get('user_data')) {
            return redirect()->route('Login')->with('error', 'Vui lòng đăng nhập !');
        }

        // Lấy thông tin người dùng từ cookie.
        $user_data = json_decode(Crypt::decryptString(Cookie::get('user_data')), true);
        if (!$user_data) {
            return redirect()->route('Login')->with('error', 'Vui lòng đăng nhập !');
        }

        // Lấy thông tin người dùng từ database.
        $user = DB::table('khachhang')->where('MAKH', $user_data['id'])->first();
        if (!isset($user)) {
            return redirect()->route('Login')->with('error', 'Vui lòng đăng nhập !');
        } else {
            if (isset($user->DIA_CHI)) {
                return view('CapNhatDiaChi.index', compact('user'));
            }
            return view('CapNhatDiaChi.index');
        }
    }

    public function update(Request $request)
    {
        $tenDuong = $request->tenDuong;
        $tenTinh = $request->tenTinh;
        $tenQuanHuyen = $request->tenQuanHuyen;
        $tenXaPhuong = $request->tenXaPhuong;

        if ($tenDuong == null || $tenTinh == null || $tenQuanHuyen == null || $tenXaPhuong == null) {
            return redirect()->route('UpdateAddress')->with('error', 'Vui lòng nhập đầy đủ thông tin địa chỉ nhân hàng của bạn!');
        }

        $address = $tenDuong . '#' . $tenTinh . '#' . $tenQuanHuyen . '#' . $tenXaPhuong;

        // Lấy thông tin người dùng từ cookie.
        $user_data = json_decode(Crypt::decryptString(Cookie::get('user_data')), true);
        if (!$user_data) {
            return redirect()->route('Login')->with('error', 'Vui lòng đăng nhập !');
        }

        // Cập nhật địa chỉ người dùng vào database.
        $check =  DB::table('khachhang')->where('MAKH', $user_data['id'])->update(['DIA_CHI' => $address]);

        if (!$check) {
            return redirect()->route('UpdateAddress')->with('error', 'Cập nhật địa chỉ thất bại !');
        }
        return redirect()->route('UpdateAddress')->with('success', 'Cập nhật địa chỉ thành công !');
    }
}
