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
            // Nếu có giỏ hàng thì trả về view với thông tin người dùng và giỏ hàng.
            // Truy vấn lấy thông tin giỏ hàng.
            $detailed_cart = DB::table('detail_cards')->where('ID_CARD', $cart->ID_CARD)->get();
            return view('cards.index', compact('user', 'cart', 'detailed_cart'));
        } else {
            return view('cards.index', compact('user', 'cart'));
        }
        return view('cards.index');
    }

    public function AddToCart(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa.
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
        $product_id = $request->input('product_id');
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
            // Chuyển hướng về trang giỏ hàng.
            return response()->json([
                'success' => true,
                'redirect_url' => route('Cart'),
                'message' => 'Sản phẩm đã được thêm vào giỏ hàng.'
            ]);
        } else {
            //  Nếu đã có giỏ hàng rồi.
            $detail_card = DB::table('detail_cards')->where('ID_CARD', $cart->ID_CARD)->where('MAMH', $product_id)->first();
            if (isset($detail_card)) {
                // Nếu sản phẩm đã có trong giỏ hàng thì tăng số lượng lên 1.
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
        }
    }
}
