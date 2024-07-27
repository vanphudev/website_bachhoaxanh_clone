<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\OTPService;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class LoginController extends Controller
{

    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function logout()
    {
        Cookie::queue(Cookie::forget('user_data'));
        return response()->json([
            'status' => true,
            'message' => 'Đăng xuất thành công !'
        ]);
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
                'email' => 'required|email',
                'sex' => 'required'
            ], [
                'username.required' => 'Tên đăng nhập là bắt buộc.',
                'email.required' => 'Vui lòng nhập Email của bạn.',
                'email.email' => 'Không đúng định dạng Email.',
                'sex.required' => 'Giới tính là bắt buộc.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('createAccount')->withErrors($e->validator)->withInput();
        }

        $username = $request->input('username');
        $EMAIL = $request->input('email');
        $sex = $request->input('sex');

        $user = DB::table('khachhang')->where('EMAIL', $EMAIL)->first();
        if ($user) {
            return redirect()->route('createAccount')->with('error', 'Ôi! Email của bạn đã tồn tại !')->withInput();
        }

        try {
            $otp = rand(100000, 999999);
            Session::put('otp', $otp);
            Session::put('email', $EMAIL);

            try {
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'vuonggiaphu.pct@gmail.com';
                $mail->Password   = 'wdee lcop eqmo fxyp';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $mail->CharSet = 'UTF-8';
                $mail->setFrom('vuonggiaphu.pct@gmail.com', 'Nguyễn Văn Phú');
                $mail->addAddress($EMAIL, 'User Name Email');

                $mail->isHTML(true);
                $mail->Subject = 'Mã xác thực OTP - Bách Hóa Xanh';
                $mail->Body    = '<h1>Mã xác thực OTP của bạn là: ' . $otp . ' . Vui lòng không chia sẻ mã này với người khác!</h1>';

                $mail->send();


                $user = [
                    'username' => $username,
                    'email' => $EMAIL,
                    'sex'   => $sex
                ];

                session(['user' => $user]);
                return redirect()->route('verify-otp-createAccount')->with('message', 'Mã xác thực OTP đã được gửi qua Email của bạn!');
            } catch (Exception $e) {
                return redirect()->route('createAccount')->with('error', 'Email không phản hồi hoặc không có thật !' . $e->errorMessage())->withInput();
            }
        } catch (\Exception) {
            return redirect()->route('createAccount')->with('error', 'Email của bạn không có thật hoặc không tồn tại !')->withInput();
        }
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
                'EMAIL' => $user['email'],
                'GIOITINH' => $user['sex']
            ]);
            
            Session::forget('user');
            return redirect()->route('loginGmail')->with('success', 'Tạo tài khoản thành công !');
        } else {
            return redirect()->route('verify-otp-createAccount')->with('error', 'Mã OTP không chính xác !')->withInput();
        }
    }

    public function loginGmail()
    {
        return view('Login.loginGmail');
    }
}
