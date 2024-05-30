<?php
function convertVietnamese($str)
{
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach ($unicode as $ascii => $uni) {
        $str = preg_replace("/($uni)/i", $ascii, $str);
    }
    $str = preg_replace('/[^a-zA-Z0-9\s]/', '', $str);
    $str = preg_replace('/\s+/', '-', $str);
    $str = strtolower($str);

    return $str;
}


function format_currency_vnd($number)
{
    $formatted_number = number_format($number, 0, '', '.');
    return $formatted_number . ' đ';
}


function customEncrypt($data, $key)
{
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}


function customDecrypt($data, $key)
{
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}


function setLoginCookie($data, $key, $expire_days = 15)
{
    $expire_time = time() + (86400 * $expire_days); // 86400 seconds in a day
    $encrypted_data = customEncrypt(json_encode($data), $key);
    setcookie('login_data', $encrypted_data, $expire_time, "/");
    setcookie('last_access', time(), $expire_time, "/");
}


function checkAndRefreshLoginCookie($key, $expire_days = 15)
{
    if (isset($_COOKIE['login_data']) && isset($_COOKIE['last_access'])) {
        $last_access = $_COOKIE['last_access'];
        $current_time = time();

        if (($current_time - $last_access) > (86400 * $expire_days)) {
            // Cookie đã hết hạn.
            setcookie('login_data', '', time() - 3600, "/");
            setcookie('last_access', '', time() - 3600, "/");
            return false;
        } else {
            // Làm mới thời gian hết hạn của cookie.
            $expire_time = $current_time + (86400 * $expire_days);
            setcookie('last_access', $current_time, $expire_time, "/");
            return json_decode(customDecrypt($_COOKIE['login_data'], $key), true);
        }
    } else {
        return false;
    }
}
function formatPhoneNumber($phoneNumber)
{
    // Kiểm tra và chuyển đổi số điện thoại Việt Nam (bắt đầu bằng 0) sang định dạng quốc tế (+84)
    if (substr($phoneNumber, 0, 1) === '0') {
        return '+84' . substr($phoneNumber, 1);
    }

    // Thêm các điều kiện khác cho các quốc gia khác nếu cần
    return $phoneNumber;
}
