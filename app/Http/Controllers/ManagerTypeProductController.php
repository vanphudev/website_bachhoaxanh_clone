<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class ManagerTypeProductController extends Controller
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

    public function randomMALMH(): string
    {
        $id = "ML";
        for ($i = 0; $i < 10; $i++) {
            $id .= rand(0, 9);
        }
        return $id;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imagePath = env('UPLOAD_PATH_IMAGE_TYPE_PRODUCT');
            $type_product = DB::table('loai_mathang')
                ->leftJoin('nhom_loai_mathang', 'loai_mathang.MANHOM_LOAI', '=', 'nhom_loai_mathang.MANHOM_LOAI')
                ->select(
                    'loai_mathang.MALOAI',
                    'loai_mathang.TENLOAI',
                    DB::raw("CONCAT('$imagePath', loai_mathang.PICTURE) as PICTURE"),
                    'nhom_loai_mathang.MANHOM_LOAI',
                    'nhom_loai_mathang.TENNHOM_LOAI',
                    'loai_mathang.TOP_MUASAM'
                )
                ->get();
            return DataTables::of($type_product)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" onclick="editTypeProduct(\'' . trim($data->MALOAI) . '\')" class="edit btn btn-primary btn m-0">Sửa</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a  href="javascript:void(0)" onclick="deleteTypeProduct(\'' . trim($data->MALOAI) . '\')" class="delete btn btn-danger m-0">Xóa</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('ManagerTypeProduct.index');
    }

    public function create(Request $request)
    {
        $nameTypeProduct = $request->tenLMH;
        $nameGroupTypeProduct = $request->maNLMH;
        $topmuasam = $request->topmuasam;
        $imageName = null;
        $MALMH = null;
        try {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                if ($file->isValid() && strpos($file->getMimeType(), 'image/') !== false) {
                    $filePath_ = env('UPLOAD_PATH_IMAGE_TYPE_PRODUCT');
                    $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($filePath_, $imageName);
                } else {
                    return response()->json(['success' => false, 'message' => 'Tệp không hợp lệ - Vui lòng chọn tệp hình ảnh!']);
                }
            } else {
                return response()->json(['success' => false, 'message' => 'Vui lòng chọn tệp hình ảnh!']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Load hình ảnh đã bị lỗi !' . $th->getMessage()]);
        }

        try {
            $nameGroupTypeProduct_ = DB::table('nhom_loai_mathang')->where('MANHOM_LOAI', $nameGroupTypeProduct)->first();
            if (!$nameGroupTypeProduct_) {
                return response()->json(['success' => false, 'message' => 'Nhóm loại mặt hàng không tồn tại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Nhóm loại mặt hàng không  tồn tại !']);
        }

        $MALMH = $this->randomMALMH();
        while (DB::table('loai_mathang')->where('MALOAI', $MALMH)->count() > 0) {
            $MALMH = $this->randomMALMH();
        }

        if (empty($nameTypeProduct) || empty($nameGroupTypeProduct)) {
            return response()->json(['success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin Tên loại và chọn nhóm loại !']);
        }

        try {
            $check = DB::table('loai_mathang')->insert([
                'MALOAI' => $MALMH,
                'TENLOAI' => $nameTypeProduct,
                'MANHOM_LOAI' => $nameGroupTypeProduct,
                'TOP_MUASAM' => $topmuasam == 1 ? 1 : 0,
                'PICTURE' => $imageName
            ]);
            if (!$check) {
                return response()->json(['success' => false, 'message' => 'Thêm loại sản phẩm thất bại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Lỗi xử lý dữ liệu !' . $th->getMessage()]);
        }

        return response()->json(['success' => true,  'message' => 'Thêm loại sản phẩm thành công !']);
    }

    public function update($id)
    {
        if (!isset($id)) {
            return response()->json(['success' => false, 'message' => 'ID loại sản phẩm không tồn tại !']);
        }
        $type_product = DB::table('loai_mathang')->where('MALOAI', $id)->first();
        if (!$type_product) {
            return response()->json(['success' => false, 'message' => 'Loại sản phẩm không tồn tại !']);
        }
        return response()->json(['success' => true, 'product' => $type_product, 'message' => 'Lấy thông tin loại sản phẩm thành công !']);
    }


    public function edit(Request $request)
    {
        $ID = $request->input('id');
        $nameTypeProduct = $request->input('tenLMH');
        $nameGroupTypeProduct = $request->input('maNLMH');
        $topmuasam = $request->has('topmuasam') ? $request->input('topmuasam') : 0;
        $imageName = null;
        try {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                if ($file->isValid() && strpos($file->getMimeType(), 'image/') !== false) {
                    $filePath_ = env('UPLOAD_PATH_IMAGE_TYPE_PRODUCT');
                    $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path($filePath_), $imageName);
                } else {
                    return response()->json(['success' => false, 'message' => 'Tệp không hợp lệ - Vui lòng chọn tệp hình ảnh!']);
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Load hình ảnh đã bị lỗi !' . $th->getMessage()]);
        }

        try {
            $nameGroupTypeProduct_ = DB::table('nhom_loai_mathang')->where('MANHOM_LOAI', $nameGroupTypeProduct)->first();
            if (!$nameGroupTypeProduct_) {
                return response()->json(['success' => false, 'message' => 'Nhóm loại mặt hàng không tồn tại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Nhóm loại mặt hàng không tồn tại !']);
        }

        if (empty($nameTypeProduct) || empty($nameGroupTypeProduct)) {
            return response()->json(['success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin Tên loại và chọn nhóm loại !']);
        }

        try {
            if ($imageName == null) {
                $type_product = DB::table('loai_mathang')->where('MALOAI', $ID)->first();
                $imageName = $type_product->PICTURE;
            }
            $check = DB::table('loai_mathang')->where('MALOAI', $ID)->update([
                'TENLOAI' => $nameTypeProduct,
                'MANHOM_LOAI' => $nameGroupTypeProduct,
                'TOP_MUASAM' => $topmuasam,
                'PICTURE' => $imageName
            ]);

            if (!$check) {
                return response()->json(['success' => false, 'message' => 'Cập nhật loại sản phẩm thất bại - không có sự thay đổi nào !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Lỗi xử lý dữ liệu trong quá trình cập nhật !' . $th->getMessage()]);
        }

        return response()->json(['success' => true,  'message' => 'Cập nhật loại sản phẩm thành công !']);
    }

    public function delete($ID)
    {
        if (!isset($ID)) {
            return response()->json(['success' => false, 'message' => 'ID loại sản phẩm không tồn tại !' . $ID]);
        }
        try {
            $type_product = DB::table('loai_mathang')->where('MALOAI', $ID)->first();
            if (!$type_product) {
                return response()->json(['success' => false, 'message' => 'Loại sản phẩm không tồn tại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Loại sản phẩm không tồn tại !']);
        }
        try {
            $index =  DB::table('loai_mathang')->where('MALOAI', $ID)->delete();
            if ($index == 0) {
                return response()->json(['success' => false, 'message' => 'Xóa loại sản phẩm thất bại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Xóa loại sản phẩm thất bại !' . $th->getMessage()]);
        }
        return response()->json(['success' => true, 'message' => 'Xóa loại sản phẩm thành công !']);
    }
}
