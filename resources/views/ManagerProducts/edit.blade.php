@extends('Admin.layouts.layouts-Product')
@section('content')
    <h2 style="margin: 10px">Thêm mặt hàng mới</h2>
    <form class="row" class="form" action="">
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <div class="form-control text-center">
                    <img class="img-fluid" src="{{ asset('../folderImages/images/icons/icon-image-null.png') }}"
                        alt="icon iamge null" style="width: 90%;" />
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Mã mặt hàng:</label>
                <input type="text" name="" class="form-control" placeholder="Mã mặt hàng tạo tự động" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên mặt hàng:</label>
                <input type="text" name="" class="form-control" placeholder="Tên mặt hàng" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Loại mặt hàng:</label>
                <select class="form-select" name="" aria-label="Default select example">
                    <option selected>Mì</option>
                    <option value="1">Thực phẩm sống</option>
                    <option value="2">Đồ uống</option>
                    <option value="3">Nước</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Thương hiệu:</label>
                <select class="form-select" name="" aria-label="Default select example">
                    <option selected>Mì</option>
                    <option value="1">Thực phẩm sống</option>
                    <option value="2">Đồ uống</option>
                    <option value="3">Nước</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Thêm ảnh mặt hàng:</label>
                <input class="form-control" name="" type="file">
            </div>

        </div>
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Đơn vị tính:</label>
                <input class="form-control" name="" type="text" list="datalistOptions1" id="exampleDataList"
                    placeholder="Đơn vị tính..." required>
                <datalist id="datalistOptions1">
                    <option value="Gói">
                    <option value="Hộp">
                    <option value="Thùng">
                    <option value="Hũ">
                    <option value="Chai">
                    <option value="Lon">
                    <option value="Bịch">
                    <option value="Lọ">
                    <option value="Lốc">
                </datalist>
            </div>
            <div class="mb-3">
                <label class="form-label">Giá bán:</label>
                <input type="text" name="" class="form-control" placeholder="Giá bán" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Khối lượng:</label>
                <input type="text" name="" class="form-control" placeholder="Khối lượng" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Số gam:</label>
                <input type="text" name="" class="form-control" placeholder="Số gam" required>
            </div>
        </div>
        <div class="col-12 mb-3" style="float: right;">
            <label class="form-label">Mô tả:</label>
            <textarea class="form-control" name="" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="col-12 align-self-end">
            <a href="../ManagerProducts"class="btn btn-success">Thoát</a>
            <input type="submit" name="btnCreate" class="btn btn-success" value="Sửa thông tin">
        </div>




    </form>
@endsection
