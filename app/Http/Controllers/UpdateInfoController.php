<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class UpdateInfoController extends Controller
{
    public function index()
    {
        if (!Cookie::get('user_data')) {
            return redirect()->route('Login');
        }
        $user_data = json_decode(Crypt::decryptString(Cookie::get('user_data')), true);
        if (!$user_data) {
            return redirect()->route('Login');
        }
        $user = DB::table('khachhang')->where('MAKH', $user_data['id'])->first();
        return view('UpdateInfo/index', compact('user'));
    }

    public function update(Request $request)
    {
        if (!Cookie::get('user_data')) {
            return redirect()->route('Login');
        }

        $user_data = json_decode(Crypt::decryptString(Cookie::get('user_data')), true);
        if (!$user_data) {
            return redirect()->route('Login');
        }

        $name = $request->username;
        $email = $request->email;
        $phone = $request->phone;
        $sex = $request->sex;

        // kiêm tra email hợp lệ và số điện thoại hợp lệ
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('UpdateInfo')->with('error', 'Email không hợp lệ !');
        }

        if (!preg_match('/^[0-9]{10,11}$/', $phone)) {
            return redirect()->route('UpdateInfo')->with('error', 'Số điện thoại không hợp lệ !');
        }

        // kiểm tra email và sdt đã tồn tại chưa
        $check_email = DB::table('khachhang')->where('EMAIL', $email)->where('MAKH', '!=', $user_data['id'])->first();
        if ($check_email) {
            return redirect()->route('UpdateInfo')->with('error', 'Email đã tồn tại !');
        }

        $check_phone = DB::table('khachhang')->where('PHONE', $phone)->where('MAKH', '!=', $user_data['id'])->first();
        if ($check_phone) {
            return redirect()->route('UpdateInfo')->with('error', 'Số điện thoại đã tồn tại !');
        }

        $check = DB::table('khachhang')->where('MAKH', $user_data['id'])->update([
            'TENKH' => $name,
            'EMAIL' => $email,
            'PHONE' => $phone,
            'GIOITINH' => $sex
        ]);

        if (!$check) {
            return redirect()->route('UpdateInfo')->with('error', 'Cập nhật thông tin thất bại !');
        }

        $user = [
            'id' => $user_data['id'],
            'name' => $name
        ];

        // Câp nhật lại cookie.
        Cookie::queue(Cookie::forget('user_data'));
        Cookie::queue('user_data', Crypt::encryptString(json_encode($user)), 60 * 24 * 30);

        return redirect()->route('UpdateInfo')->with('success', 'Cập nhật thông tin thành công!');
    }
}
