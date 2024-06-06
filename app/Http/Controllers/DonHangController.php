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
        // Kiểm tra xem người dùng đã đăng nhập chưa.
        if (!Cookie::get('user_data')) {
            return redirect()->route('Login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        }
        // Lấy thông tin người dùng từ cookie.
        $user_data = json_decode(Crypt::decryptString(Cookie::get('user_data')), true);
        if (!$user_data) {
            return redirect()->route('Login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        }

        // Lấy thông tin người dùng từ database.
        $user = DB::table('khachhang')->where('MAKH', $user_data['id'])->first();
        // Lấy thông tin giỏ hàng từ database dựa vào id người dùng.
        $card = DB::table('cards')->where('MAKH', $user->MAKH)->first();

        // Lấy thông tin sản phẩm trong giỏ hàng.
        $detail_cart = DB::table('detail_cards')
            ->where('ID_CARD', $card->ID_CARD)
            ->join('MAT_HANG', 'MAT_HANG.MAMH', '=', 'detail_cards.MAMH')
            ->leftJoin('GIAM_GIA', function ($join) {
                $join->on('GIAM_GIA.MAMH', '=', 'MAT_HANG.MAMH')
                    ->where('GIAM_GIA.LAN_GIAM_GIA', DB::raw('(SELECT MAX(LAN_GIAM_GIA) FROM GIAM_GIA WHERE GIAM_GIA.MAMH = MAT_HANG.MAMH)'));
            })
            ->select(
                'MAT_HANG.MAMH',
                'MAT_HANG.TENMH',
                'MAT_HANG.PICTURE',
                'MAT_HANG.DONVITINH',
                'MAT_HANG.GIA_BAN',
                'MAT_HANG.SO_GAM',
                'MAT_HANG.KHOILUONG',
                'detail_cards.SOLUONG',
                'GIAM_GIA.TILE_GIAM_GIA',
                DB::raw('CASE
            WHEN MAT_HANG.KHOILUONG = 0 THEN
                CASE
                    WHEN GIAM_GIA.TILE_GIAM_GIA IS NOT NULL THEN (1 - (GIAM_GIA.TILE_GIAM_GIA / 100)) * MAT_HANG.GIA_BAN * detail_cards.SOLUONG
                    ELSE MAT_HANG.GIA_BAN * detail_cards.SOLUONG
                END
            WHEN MAT_HANG.KHOILUONG = 1 THEN
                CASE
                    WHEN GIAM_GIA.TILE_GIAM_GIA IS NOT NULL THEN (((MAT_HANG.SO_GAM * MAT_HANG.GIA_BAN)/1000) * detail_cards.SOLUONG) * (1 - (GIAM_GIA.TILE_GIAM_GIA / 100))
                    ELSE ((MAT_HANG.SO_GAM * MAT_HANG.GIA_BAN)/1000) * detail_cards.SOLUONG
                END
            ELSE
                NULL
            END AS THANH_TIEN'),
                DB::raw('CASE
            WHEN MAT_HANG.KHOILUONG = 0 THEN
                CASE
                    WHEN GIAM_GIA.TILE_GIAM_GIA IS NOT NULL THEN (1 - (GIAM_GIA.TILE_GIAM_GIA / 100)) * MAT_HANG.GIA_BAN
                    ELSE MAT_HANG.GIA_BAN
                END
            WHEN MAT_HANG.KHOILUONG = 1 THEN
                CASE
                    WHEN GIAM_GIA.TILE_GIAM_GIA IS NOT NULL THEN ((MAT_HANG.SO_GAM * MAT_HANG.GIA_BAN)/1000) * (1 - (GIAM_GIA.TILE_GIAM_GIA / 100))
                    ELSE ((MAT_HANG.SO_GAM * MAT_HANG.GIA_BAN)/1000)
                END
            ELSE
                NULL
            END AS GIA_BAN_NEW')
            )
            ->get();
        $MA_DH = $this->randomDH();
        // kiểm tra ma don hang da ton tai chua
        $check = DB::table('don_hang')->where('MA_DH', $MA_DH)->first();
        while ($check) {
            $MA_DH = $this->randomDH();
            $check = DB::table('don_hang')->where('MA_DH', $MA_DH)->first();
        }
        // Lấy thông tin tổng tiền giỏ hàng.
        $total = DB::table('detail_cards')
            ->where('ID_CARD', $card->ID_CARD)
            ->join('MAT_HANG', 'MAT_HANG.MAMH', '=', 'detail_cards.MAMH')
            ->leftJoin('GIAM_GIA', function ($join) {
                $join->on('GIAM_GIA.MAMH', '=', 'MAT_HANG.MAMH')
                    ->where('GIAM_GIA.LAN_GIAM_GIA', DB::raw('(SELECT MAX(LAN_GIAM_GIA) FROM GIAM_GIA WHERE GIAM_GIA.MAMH = MAT_HANG.MAMH)'));
            })
            ->select(
                DB::raw('SUM(CASE
            WHEN MAT_HANG.KHOILUONG = 0 THEN
                CASE
                    WHEN GIAM_GIA.TILE_GIAM_GIA IS NOT NULL THEN (1 - (GIAM_GIA.TILE_GIAM_GIA / 100)) * MAT_HANG.GIA_BAN * detail_cards.SOLUONG
                    ELSE MAT_HANG.GIA_BAN * detail_cards.SOLUONG
                END
            WHEN MAT_HANG.KHOILUONG = 1 THEN
                CASE
                    WHEN GIAM_GIA.TILE_GIAM_GIA IS NOT NULL THEN (((MAT_HANG.SO_GAM * MAT_HANG.GIA_BAN)/1000) * detail_cards.SOLUONG) * (1 - (GIAM_GIA.TILE_GIAM_GIA / 100))
                    ELSE ((MAT_HANG.SO_GAM * MAT_HANG.GIA_BAN)/1000) * detail_cards.SOLUONG
                END
            ELSE
                NULL
            END) AS TONGTIEN')
            )
            ->first();
        // Tạo đơn hàng.
        DB::table('donhang')->insert([
            'MA_DH' => $MA_DH,
            'MAKH' => $user->MAKH,
            'NGAY_DAT' => date('Y-m-d H:i:s'),
            'TONGTIEN' => $total->TONGTIEN,
            'TRANGTHAI' => 0
        ]);
        // tính tổng tiền khuyến mãi
        $total_km = DB::table('detail_cards')
            ->where('ID_CARD', $card->ID_CARD)
            ->join('MAT_HANG', 'MAT_HANG.MAMH', '=', 'detail_cards.MAMH')
            ->leftJoin('GIAM_GIA', function ($join) {
                $join->on('GIAM_GIA.MAMH', '=', 'MAT_HANG.MAMH')
                    ->where('GIAM_GIA.LAN_GIAM_GIA', DB::raw('(SELECT MAX(LAN_GIAM_GIA) FROM GIAM_GIA WHERE GIAM_GIA.MAMH = MAT_HANG.MAMH)'));
            })
            ->select(
                DB::raw('SUM(CASE
            WHEN MAT_HANG.KHOILUONG = 0 THEN
                CASE
                    WHEN GIAM_GIA.TILE_GIAM_GIA IS NOT NULL THEN (MAT_HANG.GIA_BAN * detail_cards.SOLUONG) - (1 - (GIAM_GIA.TILE_GIAM_GIA / 100)) * MAT_HANG.GIA_BAN * detail_cards.SOLUONG
                    ELSE 0
                END
            WHEN MAT_HANG.KHOILUONG = 1 THEN
                CASE
                    WHEN GIAM_GIA.TILE_GIAM_GIA IS NOT NULL THEN ((MAT_HANG.SO_GAM * MAT_HANG.GIA_BAN)/1000) * detail_cards.SOLUONG - (((MAT_HANG.SO_GAM * MAT_HANG.GIA_BAN)/1000) * detail_cards.SOLUONG) * (1 - (GIAM_GIA.TILE_GIAM_GIA / 100))
                    ELSE 0
                END
            ELSE
                NULL
            END) AS TONGTIENKM')
            )
            ->first();
        // tính tổng số lượng sản phẩm
        $total_sl = DB::table('detail_cards')
            ->where('ID_CARD', $card->ID_CARD)
            ->join('MAT_HANG', 'MAT_HANG.MAMH', '=', 'detail_cards.MAMH')
            ->select(
                DB::raw('SUM(detail_cards.SOLUONG) AS TONGSL')
            )
            ->first();
        $date = date('Y-m-d H:i:s');
        return view('DonHang.index', [
            'user' => $user,
            'detail_cart' => $detail_cart,
            'total' => $total,
            'total_km' => $total_km,
            'total_sl' => $total_sl,
            'MA_DH' => $MA_DH,
            'date' => $date,
            'id_bank' => 'ID_00001',
        ]);
    }
}
