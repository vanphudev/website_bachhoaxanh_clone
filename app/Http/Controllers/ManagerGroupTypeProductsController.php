<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class ManagerGroupTypeProductsController extends Controller
{

    public function randomMANLMH(): string
    {
        $id = "NL";
        for ($i = 0; $i < 10; $i++) {
            $id .= rand(0, 9);
        }
        return $id;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imagePath = env('PATH_IMAGE_GROUP_TYPE_PRODUCT');
            $type_product = DB::table('nhom_loai_mathang')
                ->select(
                    'nhom_loai_mathang.MANHOM_LOAI',
                    'nhom_loai_mathang.TENNHOM_LOAI',
                    DB::raw("CONCAT('$imagePath', nhom_loai_mathang.PICTURE) as PICTURE")
                )
                ->get();
            return DataTables::of($type_product)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" onclick="editGroupTypeProduct(\'' . trim($data->MANHOM_LOAI) . '\')" class="edit btn btn-primary btn m-0">Sửa</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a  href="javascript:void(0)" onclick="deleteGroupTypeProduct(\'' . trim($data->MANHOM_LOAI) . '\')" class="delete btn btn-danger m-0">Xóa</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('ManagerGroupTypeProducts.index');
    }

    public function create(Request $request)
    {
        $nameGroupTypeProduct = $request->tenNLMH;
        $imageName = null;
        $MANLMH = "noproduct.png";
        try {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                if ($file->isValid() && strpos($file->getMimeType(), 'image/') !== false) {
                    $filePath_ = env('UPLOAD_PATH_IMAGE_GROUP_TYPE_PRODUCT');
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

        $MANLMH = $this->randomMANLMH();
        while (DB::table('nhom_loai_mathang')->where('MANHOM_LOAI', $MANLMH)->count() > 0) {
            $MANLMH = $this->randomMANLMH();
        }

        if (empty($nameGroupTypeProduct)) {
            return response()->json(['success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin Tên nhóm loại !']);
        }

        try {
            $check = DB::table('nhom_loai_mathang')->insert([
                'MANHOM_LOAI' => $MANLMH,
                'TENNHOM_LOAI' => $nameGroupTypeProduct,
                'PICTURE' => $imageName
            ]);
            if (!$check) {
                return response()->json(['success' => false, 'message' => 'Thêm nhóm loại sản phẩm thất bại !']);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Lỗi xử lý dữ liệu !' . $th->getMessage()]);
        }
        return response()->json(['success' => true,  'message' => 'Thêm nhóm loại sản phẩm thành công !']);
    }

    public function update()
    {
        return view('ManagerGroupTypeProducts.update');
    }

    public function edit()
    {
        return view('ManagerGroupTypeProducts.edit');
    }

    public function delete()
    {
        return view('ManagerGroupTypeProducts.delete');
    }
}
