<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    public function randomDH(): string
    {
        $id = "DH";
        for ($i = 0; $i < 10; $i++) {
            $id .= rand(0, 9);
        }
        return $id;
    }

    public function index()
    {
        if (!Cookie::get('user_data')) {
            return redirect()->route('Login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        }
        $user_data = json_decode(Crypt::decryptString(Cookie::get('user_data')), true);
        if (!$user_data) {
            return redirect()->route('Login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        }

        $user = DB::table('khachhang')->where('MAKH', $user_data['id'])->first();
        if (!isset($user)) {
            return redirect()->route('Login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        } else {
            if ($user->DIA_CHI == '' && $user->DIA_CHI == null) {
                return redirect()->route('UpdateAddress')->with('error', 'Vui lòng cập nhật địa chỉ giao hàng trước khi đặt hàng !');
            }
        }

        $card = DB::table('cards')->where('MAKH', $user->MAKH)->first();
        if (isset($card)) {
            $count = DB::table('detail_cards')
                ->where('ID_CARD', $card->ID_CARD)
                ->count();
            if ($count <= 0) {
                return redirect()->route('Home');
            }
            $id = $this->randomDH();
            while (DB::table('don_hang')->where('ID_DONHANG', $id)->count() > 0) {
                $id = $this->randomDH();
            }
            $date = date('Y-m-d H:i:s');
            $bool =  DB::table('don_hang')->insert([
                'ID_DONHANG' => $id,
                'MAKH' => $user->MAKH,
                'NGAYLAP_DH' => $date,
                'TINHTRANG_NHANHANG' => "0"
            ]);
            if ($bool) {
                $detail_card = DB::table('detail_cards')
                    ->where('ID_CARD', $card->ID_CARD)
                    ->get();
                foreach ($detail_card as $item) {
                    DB::table('chitiet_don_hang')->insert([
                        'ID_DONHANG' => $id,
                        'MAMH' => $item->MAMH,
                        'SOLUONG' => $item->SOLUONG,
                    ]);
                }
            }
            return view('DonHang.index', compact('id', 'user'));
        } else {
            return redirect()->route('Home');
        }
    }
}
