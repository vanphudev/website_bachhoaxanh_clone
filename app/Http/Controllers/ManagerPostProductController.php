<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class ManagerPostProductController extends Controller
{
    //
    public function randomMABV(): string
    {
        $id = "BV";
        for ($i = 0; $i < 10; $i++) {
            $id .= rand(0, 9);
        }
        return $id;
    }
    public function randomMABVTag(): string
    {
        $id = "TAG";
        for ($i = 0; $i < 10; $i++) {
            $id .= rand(0, 9);
        }
        return $id;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imagePath = env('PATH_IMAGE_PRODUCT_AVT');
            $type_post = DB::table('mat_hang')->select(
                    'mat_hang.MAMH',
                    'mat_hang.TENMH',
                    DB::raw("CONCAT('$imagePath', mat_hang.PICTURE) as PICTURE"),
                )
                ->get();
            return DataTables::of($type_post)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" onclick="createPost(\'' . trim($data->MAMH) . '\')" class="create btn btn-primary btn m-0 mx-2" style="font-size: 10px;">Thêm</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="createPostDetail(\'' . trim($data->MAMH) . '\')" class="cretate btn btn-primary m-0" style="font-size: 10px;">Thêm chi tiết</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="deleteProduct(\'' . trim($data->MAMH) . '\')" class="delete btn btn-danger m-0" style="font-size: 10px;">Xóa</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('ManagerPostProduct.index');
    }

    public function createPost($id)
    {
        if (!isset($id)) {
            return response()->json(['success' => false, 'message' => 'ID loại sản phẩm không tồn tại !']);
        }
        $post = DB::table('baiviet_sanpham')->where('MAMH', $id)->first();
        

        $maBV = $this->randomMABV();
        while (DB::table('baiviet_sanpham')->where('ID_BAIVIET', $maBV)->count() > 0) {
            $maBV = $this->randomMABV();
        }

        if (!isset($post)) {
            return response()->json(['success' => true, 'maBV' => $maBV, 'message' => 'Lấy thông tin sản phẩm thành công !']);
        }
        return response()->json(['success' => false, 'message' => 'Sản phẩm đã có bài viết, hãy thêm chi tiết cho bài viết !']);
    }

    

    public function createPostRequest(Request $request)
    {
        $ID = $request->maBV;
        $IDMH = $request->maMH;


        try {
            $check = DB::table('baiviet_sanpham')->insert([
                'ID_BAIVIET' => $ID,
                'MAMH' => $IDMH
            ]);

            if (!$check) {
                return response()->json(['success' => false, 'message' => 'Thêm bài viết thất bại - không có sự thay đổi nào !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Lỗi xử lý dữ liệu trong quá trình thêm!' . $th->getMessage()]);
        }

        return response()->json(['success' => true,  'message' => 'Thêm bài viết thành công !']);
    }

    public function createPostDetail($id)
    {
        if (!isset($id)) {
            return response()->json(['success' => false, 'message' => 'ID loại sản phẩm không tồn tại !']);
        }
        $post = DB::table('baiviet_sanpham')->where('MAMH', $id)->first();
        
        $maBVTag = $this->randomMABVTag();
        while (DB::table('baiviet_sanpham')->where('ID_BAIVIET', $maBVTag)->count() > 0) {
            $maBVTag = $this->randomMABVTag();
        }
        

        if (!isset($post)) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không có bài viết, hãy tạo bài viết trước !']);
        }
        return response()->json(['success' => true, 'maBV' => $post->ID_BAIVIET, 'maBVTag'=>$maBVTag,'message' => 'Lấy thông tin bài viết thành công !']);
    }

    

    public function createPostDetailRequest(Request $request)
    {
        $ID = $request->maBVTag;
        $IDBV = $request->maBV;
        $tieuDe = $request->tieude;
        $mota = $request->mota;
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
            $check = DB::table('baiviet_tag')->insert([
                'ID_TAG' => $ID,
                'ID_BAIVIET' => $IDBV,
                'TIEUDE' => $tieuDe,
                'NOIDUNG' => $mota,
                'PICTURE' => $imageName,
            ]);

            if (!$check) {
                return response()->json(['success' => false, 'message' => 'Thêm bài viết thất bại - không có sự thay đổi nào !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Lỗi xử lý dữ liệu trong quá trình thêm!' . $th->getMessage()]);
        }

        return response()->json(['success' => true,  'message' => 'Thêm bài viết thành công !']);
    }
    

    public function delete($ID)
{
    if (!isset($ID)) {
        return response()->json(['success' => false, 'message' => 'ID sản phẩm không tồn tại!']);
    }
    try {
        // Tìm bài viết dựa trên MAMH
        $post = DB::table('baiviet_sanpham')->where('MAMH', $ID)->first();
        
        if (!$post) {
            return response()->json(['success' => false, 'message' => 'Bài viết không tồn tại!']);
        }

        // Xóa các bản ghi trong bảng baiviet_tag liên quan đến bài viết
        $post_tag = DB::table('baiviet_tag')->where('ID_BAIVIET', $post->ID_BAIVIET)->delete();
        
        // Kiểm tra kết quả xóa
        if ($post_tag === false) {
            return response()->json(['success' => false, 'message' => 'Xóa thẻ bài viết thất bại!']);
        }

        // Xóa bản ghi trong bảng baiviet_sanpham
        $delete_post = DB::table('baiviet_sanpham')->where('MAMH', $ID)->delete();
        
        if ($delete_post === false) {
            return response()->json(['success' => false, 'message' => 'Xóa sản phẩm thất bại!']);
        }

    } catch (\Throwable $th) {
        return response()->json(['success' => false, 'message' => 'Xóa sản phẩm thất bại! ' . $th->getMessage()]);
    }

    return response()->json(['success' => true, 'message' => 'Xóa sản phẩm thành công!']);
}

}