@extends('Admin.layouts.layouts-Customers')
@section('content')
    <form class="row justify-content-center"
        style="width: 80%; margin: 20px auto; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; padding: 20px"
        class="form" action="">

        <h2 class="text-center" style="margin: 10px">Sữa thông tin khách hàng</h2>
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Mã khách hàng:</label>
                <input type="text" name="" class="form-control" placeholder="Mã khách hàng tạo tự động" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên khách hàng:</label>
                <input type="text" name="" class="form-control" placeholder="Tên khách hàng" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày sinh:</label>
                <input type="date" name="" class="form-control" placeholder="Chọn ngày sinh" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giới tính:</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Nam</option>
                    <option value="1">Nữ</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ:</label>
                <input type="text" name="" class="form-control" placeholder="Địa chỉ" required>
            </div>

            <a href=""class="btn btn-success">Thoát</a>
            <input type="submit" name="" class="btn btn-success" value="Sửa thông tin">
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="text" name="" class="form-control" placeholder="Tên khách hàng" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Số điện thoại:</label>
                <input type="number" name="" class="form-control" placeholder="Số điện thoại" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Account:</label>
                <input type="number" name="" class="form-control" placeholder="Account" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" name="" class="form-control" placeholder="" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Show password</label>
            </div>
        </div>
    </form>
@endsection
