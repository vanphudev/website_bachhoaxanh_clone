@extends('Admin.layouts.layouts-GroupTypeProduct')
@section('content')
    <div class="container-fluid g-0 m-0 p-3 mb-5" style="position: sticky; top: 100px; z-index: 1000; background-color: white; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;">
        <h3 style="margin-bottom: 20px;">Nhóm loại mặt hàng</h3>
        <div class="col-12">
            <div style="display: flex; flex-wrap: wrap; float: right;">
                <a class="btn btn-success" href="{{ route('ManagerGroupTypeProducts') }}" style="margin-right: 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,256,256" style="fill:#000000;">
                        <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <g transform="scale(4,4)">
                                <path
                                    d="M28.01758,5.51758l-1.00586,0.00781c-0.674,0.029 -1.35048,0.08355 -2.02148,0.18555c-5.392,0.76 -10.35475,4.14431 -13.09375,8.94531c-1.38,2.391 -2.2092,5.11863 -2.4082,7.89063l-0.04297,1.02344l-0.01953,0.8457l-0.03906,1.68945l-0.07617,3.37891l-0.28711,12.51563h-6.02344l10,14l10,-14h-6.02344l-0.28711,-12.51562l-0.14062,-6.57812c0.039,-1.727 0.46091,-3.443 1.25391,-5c1.576,-3.124 4.66927,-5.51441 8.19727,-6.19141c0.44,-0.091 0.88694,-0.14836 1.33594,-0.19336l1.52539,-0.07617l3.37891,-0.14844l6.75977,-0.29687v-5l-6.75781,-0.29687l-3.37891,-0.14844zM51,8l-10,14h6.02344l0.28711,12.51563l0.14063,6.57813c-0.039,1.727 -0.46091,3.443 -1.25391,5c-1.576,3.124 -4.66927,5.51441 -8.19727,6.19141c-0.44,0.091 -0.88694,0.14836 -1.33594,0.19336l-1.52539,0.07617l-3.37891,0.14844l-6.75977,0.29688v5l6.75781,0.29688l3.37891,0.14844l0.8457,0.03711l1.00586,-0.00781c0.674,-0.029 1.35048,-0.08355 2.02148,-0.18555c5.392,-0.76 10.35475,-4.14431 13.09375,-8.94531c1.38,-2.391 2.2092,-5.11863 2.4082,-7.89062l0.04297,-1.02344l0.01953,-0.8457l0.03906,-1.68945l0.07617,-3.37891l0.28711,-12.51562h6.02344z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </a>
                <a class="btn btn-success" href="javascript:void(0)" onclick="addGroupsTypeProduct()" style="margin-right: 20px;">
                    <Span>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,256,256" style="fill:#000000;">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <g transform="scale(10.66667,10.66667)">
                                    <path
                                        d="M12,2c-5.523,0 -10,4.477 -10,10c0,5.523 4.477,10 10,10c5.523,0 10,-4.477 10,-10c0,-5.523 -4.477,-10 -10,-10zM16,13h-3v3c0,0.552 -0.448,1 -1,1v0c-0.552,0 -1,-0.448 -1,-1v-3h-3c-0.552,0 -1,-0.448 -1,-1v0c0,-0.552 0.448,-1 1,-1h3v-3c0,-0.552 0.448,-1 1,-1v0c0.552,0 1,0.448 1,1v3h3c0.552,0 1,0.448 1,1v0c0,0.552 -0.448,1 -1,1z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </Span>
                    Thêm mới nhóm loại mặt hàng
                </a>
            </div>
        </div>
    </div>
    <div class="col-12">
        <table class="table table-hover table-striped text-center m-0" id="ajax-groupTypeProduct">
            <thead class="align-middle" style="background-color: #17770f; color: white">
                <tr class="align-middle text-center fw-bold" style="font-size: 20px">
                    <th scope="col">STT</th>
                    <th scope="col">MÃ NHÓM LOẠI</th>
                    <th scope="col">TÊN NHÓM LOẠI</th>
                    <th scope="col">HÌNH ẢNH</th>
                    <th scope="col">CHỨC NĂNG</th>
                </tr>
            </thead>
            <tbody class="align-middle">
            </tbody>
        </table>
    </div>

    <!-- Modal tạo -->
    <div class="modal fade" id="nhom-loai-mat-hang-create" aria-hidden="true" style="margin-top: 200px">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="javascript:void(0)" id="createGroupTypeProductFrom" name="createGroupTypeProductFrom" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm nhóm loại mặt hàng mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tên nhóm loại mặt hàng:</label>
                            <input type="text" name="tenNLMH" class="form-control" value="" placeholder="Tên nhóm mặt hàng" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Thêm ảnh nhóm loại mặt hàng:</label>
                            <input class="form-control" name="picture" type="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm nhóm loại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal cập nhật -->
    <div class="modal fade" id="nhom-loai-mat-hang-update" aria-hidden="true" style="margin-top: 200px">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="javascript:void(0)" id="updateGroupTypeProductFrom" name="updateGroupTypeProductFrom" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Cập nhật nhóm loại mặt hàng mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Mã nhóm loại mặt hàng:</label>
                            <input type="text" name="maNLMH" class="form-control" value="" placeholder="Mã nhóm mặt hàng" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên nhóm loại mặt hàng:</label>
                            <input type="text" name="tenNLMH" class="form-control" value="" placeholder="Tên nhóm mặt hàng" required>
                        </div>
                        <div class="mb-3">
                            <img class="p-2" name="picture" alt="" style="width: 100p; height: 100px; object-fit: cover; border-radius: 10px">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-danger">Thêm ảnh nhóm loại mặt hàng nếu muốn thay đổi:</label>
                            <input class="form-control" name="picture" type="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Cập nhật nhóm loại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
