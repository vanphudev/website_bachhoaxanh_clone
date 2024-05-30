<?php

namespace App\Models;

use Twilio\Rest\Client;

class OTPService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendOTP($to, $otp)
    {
        $to = formatPhoneNumber($to);
        $message = "Mã xác thực OTP của bạn: " . $otp;
        $this->twilio->messages->create($to, [
            'from' => env('TWILIO_PHONE_NUMBER'),
            'body' => $message,
        ]);
    }
}
