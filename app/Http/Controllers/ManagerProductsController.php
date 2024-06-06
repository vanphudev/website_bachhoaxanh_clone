<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class ManagerProductsController extends Controller
{
    public function randomMAMH(): string
    {
        $id = "MH";
        for ($i = 0; $i < 10; $i++) {
            $id .= rand(0, 9);
        }
        return $id;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imagePath = env('UPLOAD_PATH_IMAGE_PRODUCT_AVT');
            $type_product = DB::table('mat_hang')->select(
                    'mat_hang.MAMH',
                    'mat_hang.TENMH',
                    'mat_hang.DONVITINH',
                    'mat_hang.MALOAI',
                    'mat_hang.GIA_BAN',
                    DB::raw("CONCAT('$imagePath', mat_hang.PICTURE) as PICTURE"),
                    'mat_hang.MA_TH',
                )
                ->get();
            return DataTables::of($type_product)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" onclick="addListImageProduct(\'' . trim($data->MAMH) . '\')" class="edit btn btn-primary btn m-0 mx-2" style="font-size: 10px;">ListImages</a>';
                    $button .= '<a href="javascript:void(0)" onclick="addDataProduct(\'' . trim($data->MAMH) . '\')" class="edit btn btn-primary btn m-0 mx-3" style="font-size: 10px;">TTMH</a>';
                    $button .= '<a href="javascript:void(0)" onclick="editProduct(\'' . trim($data->MAMH) . '\')" class="edit btn btn-primary btn m-0" style="font-size: 10px;">Sửa</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="deleteProduct(\'' . trim($data->MAMH) . '\')" class="delete btn btn-danger m-0" style="font-size: 10px;">Xóa</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('ManagerProducts.index');
    }

    public function create(Request $request)
    {
        $nameProduct = $request->tenMH;
        $maTypeProduct = $request->maLMH;
        $maTH = $request->maTH;
        $donViTinh = $request->donvitinh;
        $giaBan = $request->giaban;
        $khoiLuong = $request->khoiluong;
        $soGam = $request->sogam;
        $moTa = $request->mota;
        $imageName = null;
        $MAMH = null;
        try {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                if ($file->isValid() && strpos($file->getMimeType(), 'image/') !== false) {
                    $filePath_ = env('UPLOAD_PATH_IMAGE_PRODUCT_AVT');
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
            $maTypeProduct_ = DB::table('loai_mathang')->where('MALOAI', $maTypeProduct)->first();
            if (!$maTypeProduct_) {
                return response()->json(['success' => false, 'message' => 'Loại mặt hàng không tồn tại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Loại mặt hàng không  tồn tại !']);
        }
        try {
            $maTH_ = DB::table('thuong_hieu')->where('MA_TH', $maTH)->first();
            if (!$maTH_) {
                return response()->json(['success' => false, 'message' => 'Thương hiệu không tồn tại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Thương hiệu không  tồn tại !']);
        }

        $MAMH = $this->randomMAMH();
        while (DB::table('mat_hang')->where('MAMH', $MAMH)->count() > 0) {
            $MAMH = $this->randomMAMH();
        }

        // if (empty($nameProduct) || empty($nameGroupTypeProduct)) {
        //     return response()->json(['success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin Tên loại và chọn nhóm loại !']);
        // }

        try {
            $check = DB::table('mat_hang')->insert([
                'MAMH' => $MAMH,
                'TENMH' => $nameProduct,
                'DONVITINH' => $donViTinh,
                'MALOAI' => $maTypeProduct,
                'MO_TA' => $moTa,
                'GIA_BAN' => $giaBan,
                'KHOILUONG' => $khoiLuong,
                'SO_GAM' => $soGam,
                'MA_TH' => $maTH,
                'PICTURE' => $imageName
            ]);
            if (!$check) {
                return response()->json(['success' => false, 'message' => 'Thêm sản phẩm thất bại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Lỗi xử lý dữ liệu !' . $th->getMessage()]);
        }

        return response()->json(['success' => true,  'message' => 'Thêm sản phẩm thành công !']);
    }

    public function update($id)
    {
        if (!isset($id)) {
            return response()->json(['success' => false, 'message' => 'ID loại sản phẩm không tồn tại !']);
        }
        $product = DB::table('mat_hang')->where('MAMH', $id)->first();
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Loại sản phẩm không tồn tại !']);
        }
        return response()->json(['success' => true, 'product' => $product, 'message' => 'Lấy thông tinsản phẩm thành công !']);
    }

    

    public function edit(Request $request)
    {
        // $ID = $request->input('maMH');
        // $nameProduct = $request->input('tenMH');
        // $nameGroupTypeProduct = $request->input('maNLMH');
        // $topmuasam = $request->has('topmuasam') ? $request->input('topmuasam') : 0;
        // $imageName = null;
        $ID = $request->maMH;
        $nameProduct = $request->tenMH;
        $maTypeProduct = $request->maLMH;
        $maTH = $request->maTH;
        $donViTinh = $request->donvitinh;
        $giaBan = $request->giaban;
        $khoiLuong = $request->khoiluong;
        $soGam = $request->sogam;
        $moTa = $request->mota;
        $imageName = null;
        try {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                if ($file->isValid() && strpos($file->getMimeType(), 'image/') !== false) {
                    $filePath_ = env('UPLOAD_PATH_IMAGE_PRODUCT_AVT');
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
            $check = DB::table('mat_hang')->where('MAMH', $ID)->update([
                'TENMH' => $nameProduct,
                'DONVITINH' => $donViTinh,
                'MALOAI' => $maTypeProduct,
                'MO_TA' => $moTa,
                'GIA_BAN' => $giaBan,
                'KHOILUONG' => $khoiLuong,
                'SO_GAM' => $soGam,
                'MA_TH' => $maTH,
                'PICTURE' => $imageName
            ]);

            if (!$check) {
                return response()->json(['success' => false, 'message' => 'Cập nhật sản phẩm thất bại - không có sự thay đổi nào !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Lỗi xử lý dữ liệu trong quá trình cập nhật !' . $th->getMessage()]);
        }

        return response()->json(['success' => true,  'message' => 'Cập nhật sản phẩm thành công !']);
    }
    

    public function addDataProduct($id)
    {
        if (!isset($id)) {
            return response()->json(['success' => false, 'message' => 'ID loại sản phẩm không tồn tại !']);
        }
        $product = DB::table('mat_hang')->where('MAMH', $id)->first();
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Loại sản phẩm không tồn tại !']);
        }
        return response()->json(['success' => true, 'product' => $product, 'message' => 'Lấy thông tinsản phẩm thành công !']);
    }
    public function addData(Request $request)
    {
        $ID = $request->maMH;
        $thongTin = $request->thongtinInput;
        $moTa = $request->mota;

        try {
            $check = DB::table('thong_tin_mat_hang')->insert([
                'TEN_THONG_TIN' => $thongTin,
                'NOI_DUNG' => $moTa,
                'MAMH' => $ID,
            ]);

            if (!$check) {
                return response()->json(['success' => false, 'message' => 'Thêm thông tin sản phẩm thất bại - không có sự thay đổi nào !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Lỗi xử lý dữ liệu trong quá trình cập nhật !' . $th->getMessage()]);
        }

        return response()->json(['success' => true,  'message' => 'Thêm thông tin sản phẩm thành công !']);
    }
    

        public function addListImageProduct($id)
    {
        if (!isset($id)) {
            return response()->json(['success' => false, 'message' => 'ID loại sản phẩm không tồn tại !']);
        }
        $product = DB::table('mat_hang')->where('MAMH', $id)->first();
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Loại sản phẩm không tồn tại !']);
        }
        return response()->json(['success' => true, 'product' => $product, 'message' => 'Lấy thông tinsản phẩm thành công !']);
    }
    public function addListImage(Request $request)
    {
        $ID = $request->maMH;
        $imageName = null;
        try {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                if ($file->isValid() && strpos($file->getMimeType(), 'image/') !== false) {
                    $filePath_ = env('UPLOAD_PATH_IMAGE_PRODUCT_DETAIL');
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
            $check = DB::table('picture_mat_hang')->insert([
                'PICTURE' => $imageName,
                'MAMH' => $ID,
            ]);

            if (!$check) {
                return response()->json(['success' => false, 'message' => 'Thêm ảnh sản phẩm thất bại - không có sự thay đổi nào !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Lỗi xử lý dữ liệu trong quá trình cập nhật !' . $th->getMessage()]);
        }

        return response()->json(['success' => true,  'message' => 'Thêm ảnh sản phẩm thành công !']);
    }
    

    public function delete($ID)
    {
        if (!isset($ID)) {
            return response()->json(['success' => false, 'message' => 'ID sản phẩm không tồn tại !' . $ID]);
        }
        try {
            $product = DB::table('mat_hang')->where('MAMH', $ID)->first();
            if (!$product) {
                return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại !']);
        }
        try {
            $index =  DB::table('mat_hang')->where('MAMH', $ID)->delete();
            if ($index == 0) {
                return response()->json(['success' => false, 'message' => 'Xóa sản phẩm thất bại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Xóa sản phẩm thất bại !' . $th->getMessage()]);
        }
        return response()->json(['success' => true, 'message' => 'Xóa sản phẩm thành công !']);
    }


    
}