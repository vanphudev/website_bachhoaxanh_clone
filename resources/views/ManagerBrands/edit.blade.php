@extends('Admin.layouts.layouts-Brands')
@section('content')
    <form class="row justify-content-center"
        style="width: 80%; margin: 20px auto; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; padding: 20px"
        class="form" action="">

        <h2 class="text-center" style="margin: 10px">Sửa thông tin thương hiệu mới</h2>
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <div class="form-control text-center">
                    <img class="img-fluid" src="{{ asset('../folderImages/images/icons/icon-image-null.png') }}"
                        alt="icon iamge null" style="width: 90%;" />
                </div>
            </div>

            <a href=""class="btn btn-success">Thoát</a>
            <input type="submit" name="btnCreate" class="btn btn-success" value="Sửa thông tin">
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Mã thương hiệu:</label>
                <input type="text" name="" class="form-control" placeholder="Mã thương hiệu tạo tự động" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên thương hiệu:</label>
                <input type="text" name="" class="form-control" placeholder="Tên thương hiệu" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh:</label>
                <input type="file" name="" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả:</label>
                <input type="text" name="" class="form-control" placeholder="Mô tả" required>
            </div>
        </div>

    </form>
@endsection
