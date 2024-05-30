<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\OTPService;

class AuthController extends Controller
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function sendOTP(Request $request)
    {
        $request->validate([
            'phonenumber' => 'required|numeric',
        ]);

        $phoneNumber = $request->input('phonenumber');
        $user = DB::table('khachhang')->where('PHONE', $phoneNumber)->first();

        if (!$user) {
            return redirect()->route('Login')->with('error', 'Số điện thoại ' . $phoneNumber  . ' không tồn tại !');
        }

        $otp = rand(100000, 999999); // Generate a 6-digit OTP

        // Save OTP and phone number in session (you can also use a database)
        Session::put('otp', $otp);
        Session::put('phone', $phoneNumber);

        // Send OTP via SMS
        $this->otpService->sendOTP($phoneNumber, $otp);

        return redirect()->route('verifyOtpForm')->with('message', 'Mã xác thực OTP đã được gửi qua số điện thoại của bạn!');
    }



    public function verifyOtpForm()
    {
        return view('Auth.verify-otp');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $otp = $request->input('otp');
        $phoneNumber = Session::get('phone');

        if ($otp == Session::get('otp')) {
            // OTP is correct
            // Log the user in
            $user = DB::table('users')->where('phone', $phoneNumber)->first();
            Session::put('user', $user);

            return redirect()->route('home')->with('message', 'Đăng nhập thành công');
        } else {
            return redirect()->route('verifyOtpForm')->with('error', 'OTP không chính xác');
        }
    }
}
