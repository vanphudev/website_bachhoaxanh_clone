<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{
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
        $cart = DB::table('cards')->where('MAKH', $user->MAKH)->first();

        if (isset($cart)) {
            $detail_cart = DB::table('detail_cards')
                ->where('ID_CARD', $cart->ID_CARD)
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
            $tongtien = 0;
            foreach ($detail_cart as $item) {
                $tongtien += $item->THANH_TIEN;
            }
            $count = count($detail_cart);
            return view('cards.index', compact('user', 'cart', 'detail_cart', 'tongtien', 'count'));
        }
        return view('cards.index', compact('user', 'cart'));
    }

    public function RemoveProductFromCart($mamh)
    {
        if (!Cookie::get('user_data')) {
            return response()->json([
                'success' => false,
                'redirect_url' => route('Login'),
                'message' => 'Vui lòng đăng nhập để xóa sản phẩm khỏi giỏ hàng !'
            ]);
        }

        $user_data = json_decode(Crypt::decryptString(Cookie::get('user_data')), true);
        if (!$user_data) {
            return response()->json([
                'success' => false,
                'redirect_url' => route('Login'),
                'message' => 'Vui lòng đăng nhập để xóa sản phẩm khỏi giỏ hàng !'
            ]);
        }

        $user = DB::table('khachhang')->where('MAKH', $user_data['id'])->first();
        $product_id = $mamh;
        $cart = DB::table('cards')->where('MAKH', $user->MAKH)->first();
        if (isset($cart)) {
            $detail_card = DB::table('detail_cards')->where('ID_CARD', $cart->ID_CARD)->where('MAMH', $product_id)->first();
            if (isset($detail_card)) {
                DB::table('detail_cards')->where('ID_CARD', $cart->ID_CARD)->where('MAMH', $product_id)->delete();
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false
                ]);
            }
        } else {
            return response()->json([
                'success' => false
            ]);
        }
        return response()->json([
            'success' => false
        ]);
    }

    public function UpdateToCart($mamh, $action)
    {
        if (!Cookie::get('user_data')) {
            return response()->json([
                'success' => false,
                'redirect_url' => route('Login'),
                'message' => 'Vui lòng đăng nhập để cập nhật giỏ hàng !'
            ]);
        }
        $user_data = json_decode(Crypt::decryptString(Cookie::get('user_data')), true);
        if (!$user_data) {
            return response()->json([
                'success' => false,
                'redirect_url' => route('Login'),
                'message' => 'Vui lòng đăng nhập để cập nhật giỏ hàng !'
            ]);
        }

        $user = DB::table('khachhang')->where('MAKH', $user_data['id'])->first();
        $cart = DB::table('cards')->where('MAKH', $user->MAKH)->first();
        if (isset($cart)) {
            $detail_card = DB::table('detail_cards')->where('ID_CARD', $cart->ID_CARD)->where('MAMH', $mamh)->first();
            if (isset($detail_card)) {
                if ($action == 'tang') {
                    DB::table('detail_cards')->where('ID_CARD', $cart->ID_CARD)->where('MAMH', $mamh)->increment('SOLUONG');
                } else if ($action == 'giam') {
                    DB::table('detail_cards')->where('ID_CARD', $cart->ID_CARD)->where('MAMH', $mamh)->decrement('SOLUONG');
                }

                $detail_cart = DB::table('detail_cards')
                    ->where('ID_CARD', $cart->ID_CARD)
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
                $tongtien = 0;
                $count = 0;
                foreach ($detail_cart as $item) {
                    $tongtien += $item->THANH_TIEN;
                }
                $count = count($detail_cart);
                return response()->json([
                    'success' => true,
                    'count' => isset($count) ? $count : null,
                    'tongtien' => isset($tongtien) ? format_currency_vnd($tongtien) : null,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Sản phẩm không tồn tại trong giỏ hàng !'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Giỏ hàng không tồn tại !'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Lỗi xử lý dữ liệu trong quá trình cập nhật giỏ hàng !'
        ]);
    }


    public function AddToCart(Request $request)
    {
        if (!Cookie::get('user_data')) {
            return response()->json([
                'success' => false,
                'redirect_url' => route('Login'),
                'message' => 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng !'
            ]);
        }
        $user_data = json_decode(Crypt::decryptString(Cookie::get('user_data')), true);
        if (!$user_data) {
            return response()->json([
                'success' => false,
                'redirect_url' => route('Login'),
                'message' => 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng !'
            ]);
        }
        $user = DB::table('khachhang')->where('MAKH', $user_data['id'])->first();
        $product_id = $request->product_id;
        $cart = DB::table('cards')->where('MAKH', $user->MAKH)->first();
        if (!isset($cart)) {
            // Nếu chưa có giỏ hàng thì tạo giỏ hàng mới.
            $id_card = DB::table('cards')->insertGetId([
                'MAKH' => $user->MAKH
            ]);
            DB::table('detail_cards')->insert([
                'ID_CARD' => $id_card,
                'MAMH' => $product_id,
                'SOLUONG' => 1
            ]);
            return response()->json([
                'success' => true,
                'redirect_url' => route('Cart'),
                'message' => 'Sản phẩm đã được thêm vào giỏ hàng thành công.'
            ]);
        } else {
            try {
                //  Nếu đã có giỏ hàng rồi.
                $detail_card = DB::table('detail_cards')->where('ID_CARD', $cart->ID_CARD)->where('MAMH', $product_id)->first();
                if (isset($detail_card)) {
                    // công số lượng sản phẩm trong giỏ hàng lên với số lượng mới.
                    DB::table('detail_cards')->where('ID_CARD', $cart->ID_CARD)->where('MAMH', $product_id)->increment('SOLUONG');
                } else {
                    // Nếu sản phẩm chưa có trong giỏ hàng thì thêm mới vào giỏ hàng.
                    DB::table('detail_cards')->insert([
                        'ID_CARD' => $cart->ID_CARD,
                        'MAMH' => $product_id,
                        'SOLUONG' => 1
                    ]);
                }
                // Chuyển hướng về trang giỏ hàng.
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('Cart'),
                    'message' => 'Sản phẩm đã được thêm vào giỏ hàng.'
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lỗi xử lý dữ liệu trong quá trình thêm vào giỏ hàng !' . $th->getMessage()
                ]);
            }
        }
    }
}
