@extends('Admin.layouts.layouts-Product')
@section('content')
    <h2 style="margin: 10px">TSữa thông tin nhân viên</h2>
    <form class="row" class="form" action="">
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <div class="form-control text-center">
                    <img class="img-fluid" src="{{ asset('../folderImages/images/icons/icon-image-null.png') }}"
                        alt="icon iamge null" style="width: 9   0%;" />
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Mã nhân viên:</label>
                <input type="text" name="" class="form-control" placeholder="Mã nhân viên tạo tự động" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên nhân viên:</label>
                <input type="text" name="" class="form-control" placeholder="Tên nhân viên" required>
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
                <label class="form-label">Trình độ học vấn:</label>
                <select class="form-select" name="" aria-label="Default select example">
                    <option value="college" selected>Cao đẳng</option>
                    <option value="university">Đại học</option>
                    <option value="highschool">Trung học phổ thông</option>
                    <option value="vocational">Trung cấp nghề</option>
                    <option value="masters">Thạc sĩ</option>
                    <option value="phd">Tiến sĩ</option>
                    <option value="associate-degree">Cử nhân liên kết</option>
                    <option value="diploma">Chứng chỉ</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Thêm ảnh nhân viên:</label>
                <input class="form-control" type="file">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Chức vụ:</label>
                <select class="form-select" name="" aria-label="Default select example">
                    <option selected>Nhân viên</option>
                    <option value="1">Quản lý</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">CMND/CCCD:</label>
                <input type="text" name="" class="form-control" placeholder="Tên nhân viên" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày vào làm:</label>
                <input type="date" name="" class="form-control" placeholder="Chọn ngày sinh" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hệ số lương:</label>
                <input class="form-control" name="salary-coefficient" type="text" list="datalistOptions2"
                    id="salaryDataList" placeholder="Hệ số lương..." required>
                <datalist id="datalistOptions2">
                    <option value="1.0">
                    <option value="1.1">
                    <option value="1.2">
                    <option value="1.3">
                    <option value="1.4">
                    <option value="1.5">
                    <option value="1.6">
                    <option value="1.7">
                    <option value="1.8">
                    <option value="1.9">
                    <option value="2.0">
                    <option value="2.1">
                    <option value="2.2">
                    <option value="2.3">
                    <option value="2.4">
                    <option value="2.5">
                    <option value="2.6">
                    <option value="2.7">
                    <option value="2.8">
                    <option value="2.9">
                    <option value="3.0">
                </datalist>
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại:</label>
                <input type="number" name="" class="form-control" placeholder="Số điện thoại" required>
            </div>
        </div>
        <div class="col-12">
            <a href="../ManagerEmployees"class="btn btn-success">Thoát</a>
            <input type="submit" name="btnCreate" class="btn btn-success" value="Sửa thông tin">
        </div>




    </form>
@endsection
