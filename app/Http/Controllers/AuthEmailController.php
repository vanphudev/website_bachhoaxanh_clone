<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;


class AuthEmailController extends Controller
{
    public function sendOTPEMmail(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email'
            ], [
                'email.required' => 'Emaillà bắt buộc.',
                'email.email' => 'Không đúng định dạng Email.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('loginGmail')->withErrors($e->validator)->withInput();
        }

        $EMAIL = $request->input('email');
        $user = DB::table('khachhang')->where('EMAIL', $EMAIL)->first();

        if (!$user) {
            return redirect()->route('loginGmail')->with('error', 'Email ' . $EMAIL  . ' không tồn tại !')->withInput();
        }

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
            return redirect()->route('verifyOTPEmail')->with('message', 'Mã xác thực OTP đã được gửi qua Email của bạn!');
        } catch (Exception $e) {
            return redirect()->route('loginGmail')->with('error', 'Email không phản hồi !' . $e->errorMessage())->withInput();
        }
    }


    public function verifyOTPEmailForm()
    {
        return view('Login.verifyOTPemail');
    }


    public function verifyOTPEmail(Request $request)
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
            return redirect()->route('verifyOTPEmailForm')->withErrors($e->validator)->withInput();
        }

        $otp = $request->input('otp');
        $email = Session::get('email');
        if ($otp == Session::get('otp')) {
            $user = DB::table('khachhang')->where('EMAIL', $email)->first();
            if ($user) {
                $userData = [
                    'id' => $user->MAKH,
                    'name' => $user->TENKH
                ];
                $encryptedData = Crypt::encryptString(json_encode($userData));
                $minutes = 525600;
                Cookie::queue('user_data', $encryptedData, $minutes);
                return redirect()->route('Home');
            } else {
                return redirect()->route('verifyOTPEmailForm')->with('error', 'Người dùng không tồn tại!')->withInput();
            }
        } else {
            return redirect()->route('verifyOTPEmailForm')->with('error', 'Mã xác thực OTP không chính xác!')->withInput();
        }
    }
}
