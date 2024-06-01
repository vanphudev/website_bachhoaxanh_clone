<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\OTPService;
use Illuminate\Support\Facades\Crypt;


class LoginController extends Controller
{

    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }
    public function index()
    {
        return view('Login.index');
    }

    public function createAccount()
    {
        return view('Login.createAccount');
    }

    public function verifyAccount(Request $request)
    {
        try {
            $validated = $request->validate([
                'username' => 'required',
                'phone' => 'required|numeric',
                'sex' => 'required'
            ], [
                'username.required' => 'Tên đăng nhập là bắt buộc.',
                'phone.required' => 'Số điện thoại là bắt buộc.',
                'phone.numeric' => 'Số điện thoại phải là số.',
                'sex.required' => 'Giới tính là bắt buộc.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('createAccount')->withErrors($e->validator)->withInput();
        }

        $username = $request->input('username');
        $phone = $request->input('phone');
        $sex = $request->input('sex');

        $user = DB::table('khachhang')->where('PHONE', $phone)->first();
        if ($user) {
            return redirect()->route('createAccount')->with('error', 'Ôi! Số điện thoại đã tồn tại !')->withInput();
        }

        try {
            $otp = rand(100000, 999999);
            Session::put('otp', $otp);
            Session::put('phone', $phone);
            $this->otpService->sendOTP($phone, $otp);
        } catch (\Exception) {
            return redirect()->route('createAccount')->with('error', 'Số điện thoại không có thật !')->withInput();
        }

        $user = [
            'username' => $username,
            'phone' => $phone,
            'sex'   => $sex
        ];

        session(['user' => $user]);
        return redirect()->route('verify-otp-createAccount')->with('message', 'Mã xác thực OTP đã được gửi qua số điện thoại của bạn!');
    }

    public function verifyOtpCreateAccount()
    {
        return view('Login.verifyOtpCreateAccount');
    }

    public function verifyOtpCreateAccountOTP(Request $request)
    {
        try {
            $validated = $request->validate([
                'otp' => 'required|numeric|digits:6'
            ], [
                'otp.required' => 'Mã OTP là bắt buộc.',
                'otp.numeric' => 'Mã OTP phải là số.',
                'otp.digits' => 'Mã OTP phải có 6 ký tự số.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('verify-otp-createAccount')->withErrors($e->validator)->withInput();
        }

        $otp = $request->input('otp');

        if ($otp == Session::get('otp')) {
            $user = session('user');
            $user = DB::table('khachhang')->insert([
                'TENKH' => $user['username'],
                'PHONE' => $user['phone'],
                'GIOITINH' => $user['sex']
            ]);
            Session::forget('user');
            return redirect()->route('Login');
        } else {
            return redirect()->route('verify-otp-createAccount')->with('error', 'Mã OTP không chính xác !')->withInput();
        }
    }

    public function loginGmail()
    {
        return view('Login.loginGmail');
    }
}
