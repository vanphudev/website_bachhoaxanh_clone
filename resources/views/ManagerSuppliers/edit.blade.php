@extends('Admin.layouts.layouts-Suppliers')
@section('content')
    <form class="row justify-content-center"
        style="width: 80%; margin: 20px auto; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; padding: 20px"
        class="form" action="">

        <h2 class="text-center" style="margin: 10px">Sửa thông tin nhà cung cấp mới</h2>
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Mã nhà cung cấp:</label>
                <input type="text" name="" class="form-control" placeholder="Mã nhà cung cấp tạo tự động" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên nhà cung cấp:</label>
                <input type="text" name="" class="form-control" placeholder="Tên nhà cung cấp" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Thông tin chi tiết:</label>
                <input type="text" name="" class="form-control" placeholder="Thông tin chi tiết" required>
            </div>
            <a href=""class="btn btn-success">Thoát</a>
            <input type="submit" name="" class="btn btn-success" value="Sửa thông tin">
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Số điện thoại:</label>
                <input type="number" name="" class="form-control" placeholder="Số điện thoại" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="text" name="" class="form-control" placeholder="Tên nhà cung cấp" required>
            </div>

        </div>




    </form>
@endsection
