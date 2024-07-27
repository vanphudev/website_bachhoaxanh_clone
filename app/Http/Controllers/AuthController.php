<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\OTPService;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{

    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function sendOTP(Request $request)
    {
        try {
            $validated = $request->validate([
                'phonenumber' => 'required|numeric'
            ], [
                'phonenumber.required' => 'Số điện thoại là bắt buộc.',
                'phonenumber.numeric' => 'Số điện thoại phải là số.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('Login')->withErrors($e->validator)->withInput();
        }

        $phoneNumber = $request->input('phonenumber');
        $user = DB::table('khachhang')->where('PHONE', $phoneNumber)->first();

        if (!$user) {
            return redirect()->route('Login')->with('error', 'Số điện thoại ' . $phoneNumber  . ' không tồn tại !')->withInput();
        }

        $otp = rand(100000, 999999);

        Session::put('otp', $otp);
        Session::put('phone', $phoneNumber);

        $this->otpService->sendOTP($phoneNumber, $otp);

        return redirect()->route('verifyOtpForm')->with('message', 'Mã xác thực OTP đã được gửi qua số điện thoại của bạn!');
    }


    public function verifyOtpForm()
    {
        return view('Auth.verify-otp');
    }

    public function verifyOTP(Request $request)
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
            return redirect()->route('verifyOtpForm')->withErrors($e->validator)->withInput();
        }

        $otp = $request->input('otp');
        $phoneNumber = Session::get('phone');
        if ($otp == Session::get('otp')) {
            $user = DB::table('khachhang')->where('PHONE', $phoneNumber)->first();
            if ($user) {
                $userData = [
                    'id' => $user->MAKH,
                    'name' => $user->TENKH
                ];
                $encryptedData = Crypt::encryptString(json_encode($userData));
                $minutes = 525600; // 1 năm
                Cookie::queue('user_data', $encryptedData, $minutes);
                return redirect()->route('Home');
            } else {
                return redirect()->route('verifyOtpForm')->with('error', 'Người dùng không tồn tại!')->withInput();
            }
        } else {
            return redirect()->route('verifyOtpForm')->with('error', 'Mã xác thực OTP không chính xác!')->withInput();
        }
    }
}
