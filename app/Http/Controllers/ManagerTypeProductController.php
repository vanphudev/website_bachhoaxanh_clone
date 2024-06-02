<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ManagerTypeProductController extends Controller
{
    public function index()
    {
        // // Kiểm tra xem người dùng đã đăng nhập chưa.
        // if (!Cookie::get('user_Admin')) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ cookie.
        // $user_Admin = json_decode(Crypt::decryptString(Cookie::get('user_Admin')), true);
        // if (!$user_Admin) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ database.
        // $user = DB::table('nhanvien')->where('MANV', $user_Admin['id'])->first();

        // Lấy danh sách loại sản phẩm join với bảng nhóm sản phẩm.
        $type_products = DB::table('loai_mathang')
            ->join('nhom_loai_mathang', 'loai_mathang.MANHOM_LOAI', '=', 'nhom_loai_mathang.MANHOM_LOAI')
            ->select('loai_mathang.*', 'nhom_loai_mathang.*')
            ->get();
        return view('ManagerTypeProduct.index', ['type_products' => $type_products]);
    }

    public function create(Request $request)
    {
        // // Kiểm tra xem người dùng đã đăng nhập chưa.
        // if (!Cookie::get('user_Admin')) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ cookie.
        // $user_Admin = json_decode(Crypt::decryptString(Cookie::get('user_Admin')), true);
        // if (!$user_Admin) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ database.
        // $user = DB::table('nhanvien')->where('MANV', $user_Admin['id'])->first();

        // Thêm loại sản phẩm.
        $nameTypeProduct = $request->nameTypeProduct;
        $nameGroupTypeProduct = $request->nameGroupTypeProduct;
        $type_product = DB::table('loai_mathang')->where('TENLOAI', $nameTypeProduct)->first();
        if ($type_product) {
            return redirect()->route('ManagerTypeProduct')->with('error', 'Loại sản phẩm đã tồn tại !');
        }
        $group_type_product = DB::table('nhom_loai_mathang')->where('TENNHOM_LOAI', $nameGroupTypeProduct)->first();
        if (!$group_type_product) {
            return redirect()->route('ManagerTypeProduct')->with('error', 'Nhóm loại sản phẩm không tồn tại !');
        }
        DB::table('loai_mathang')->insert([
            'TENLOAI' => $nameTypeProduct,  
            'MANHOM_LOAI' => $group_type_product->MANHOM_LOAI
        ]);
        return redirect()->route('ManagerTypeProduct')->with('success', 'Thêm loại sản phẩm thành công !');
    }

    public function getID(Request $request)
    {
        // // Kiểm tra xem người dùng đã đăng nhập chưa.
        // if (!Cookie::get('user_Admin')) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ cookie.
        // $user_Admin = json_decode(Crypt::decryptString(Cookie::get('user_Admin')), true);
        // if (!$user_Admin) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ database.
        // $user = DB::table('nhanvien')->where('MANV', $user_Admin['id'])->first();

        // Lấy thông tin loại sản phẩm.
        $idTypeProduct = $request->data_IDTYPE;
        $type_product = DB::table('loai_mathang')->where('MALOAI', $idTypeProduct)->first();

        if (isset($type_product)) {
            $returnHTML = view('ManagerTypeProduct.update', ['type_product' => $type_product])->render();
            return response()->json(['success' => true, 'html' => $returnHTML]);
        } else {
            return response()->json(['success' => false, 'message' => 'Product type not found.']);
        }
    }

    public function update(Request $request)
    {
        // // Kiểm tra xem người dùng đã đăng nhập chưa.
        // if (!Cookie::get('user_Admin')) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ cookie.
        // $user_Admin = json_decode(Crypt::decryptString(Cookie::get('user_Admin')), true);
        // if (!$user_Admin) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ database.
        // $user = DB::table('nhanvien')->where('MANV', $user_Admin['id'])->first();

        $maLMH = $request->maLMH;
        $tenLMH = $request->tenLMH;
        $maNLMH = $request->maNLMH;
        $topmuasam = $request->topmuasam;

        $file = $request->file('picture');
        $fileName = null;

        if ($file) {
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path(env('PATH_IMAGE_TYPE_PRODUCT'));
            if (File::exists($destinationPath . $fileName)) {
                return response()->json(['success' => false, 'message' => 'File already exists in the directory.']);
            }
            $file->move($destinationPath, $fileName);
        }

        $type_product = DB::table('loai_mathang')->where('MALOAI', $maLMH)->first();

        if (!$type_product) {
            return response()->json(['success' => false, 'message' => 'Loại sản phẩm không tồn tại !']);
        }

        $check =  DB::table('loai_mathang')->where('MALOAI', $maLMH)->update([
            'TENLOAI' => $tenLMH,
            'MANHOM_LOAI' => $maNLMH,
            'TOP_MUASAM' => $topmuasam == 1 ? 1 : 0,
            'PICTURE' => $fileName
        ]);

        if (!$check) {
            return response()->json(['success' => false, 'message' => 'Cập nhật loại sản phẩm thất bại!']);
        }

        return response()->json(['success' => true, 'message' => 'Cập nhật loại sản phẩm thành công!']);
    }


    public function delete(Request $request)
    {
        // // Kiểm tra xem người dùng đã đăng nhập chưa.
        // if (!Cookie::get('user_Admin')) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ cookie.
        // $user_Admin = json_decode(Crypt::decryptString(Cookie::get('user_Admin')), true);
        // if (!$user_Admin) {
        //     return redirect()->route('LoginAdmin')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng !');
        // }
        // // Lấy thông tin người dùng từ database.
        // $user = DB::table('nhanvien')->where('MANV', $user_Admin['id'])->first();

        // Xóa loại sản phẩm.
        $idTypeProduct = $request->idTypeProduct;
        $type_product = DB::table('loai_mathang')->where('MALOAI', $idTypeProduct)->first();
        if (!$type_product) {
            return redirect()->route('ManagerTypeProduct')->with('error', 'Loại sản phẩm không tồn tại !');
        }
        DB::table('loai_mathang')->where('MALOAI', $idTypeProduct)->delete();
        return redirect()->route('ManagerTypeProduct')->with('success', 'Xóa loại sản phẩm thành công !');
    }
}
