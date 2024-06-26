@extends('Admin.layouts.layouts-Product')
@section('content')
    <div class="col-12">
        <div class="container-fluid g-0 m-0 p-3 mb-5"
            style="position: sticky; top: 100px; z-index: 1000; background-color: white; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;">
            <h3>Hàng hóa</h3>
            <div style="display: flex; flex-wrap: wrap; float: right; ">
                <a class="btn btn-success" href="{{ route('ManagerProducts') }}" style="margin-right: 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,256,256"
                        style="fill:#000000;">
                        <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <g transform="scale(4,4)">
                                <path
                                    d="M28.01758,5.51758l-1.00586,0.00781c-0.674,0.029 -1.35048,0.08355 -2.02148,0.18555c-5.392,0.76 -10.35475,4.14431 -13.09375,8.94531c-1.38,2.391 -2.2092,5.11863 -2.4082,7.89063l-0.04297,1.02344l-0.01953,0.8457l-0.03906,1.68945l-0.07617,3.37891l-0.28711,12.51563h-6.02344l10,14l10,-14h-6.02344l-0.28711,-12.51562l-0.14062,-6.57812c0.039,-1.727 0.46091,-3.443 1.25391,-5c1.576,-3.124 4.66927,-5.51441 8.19727,-6.19141c0.44,-0.091 0.88694,-0.14836 1.33594,-0.19336l1.52539,-0.07617l3.37891,-0.14844l6.75977,-0.29687v-5l-6.75781,-0.29687l-3.37891,-0.14844zM51,8l-10,14h6.02344l0.28711,12.51563l0.14063,6.57813c-0.039,1.727 -0.46091,3.443 -1.25391,5c-1.576,3.124 -4.66927,5.51441 -8.19727,6.19141c-0.44,0.091 -0.88694,0.14836 -1.33594,0.19336l-1.52539,0.07617l-3.37891,0.14844l-6.75977,0.29688v5l6.75781,0.29688l3.37891,0.14844l0.8457,0.03711l1.00586,-0.00781c0.674,-0.029 1.35048,-0.08355 2.02148,-0.18555c5.392,-0.76 10.35475,-4.14431 13.09375,-8.94531c1.38,-2.391 2.2092,-5.11863 2.4082,-7.89062l0.04297,-1.02344l0.01953,-0.8457l0.03906,-1.68945l0.07617,-3.37891l0.28711,-12.51562h6.02344z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </a>
                <a href="javascript:void(0)" onclick="addProduct()" class="btn btn-success">
                    <Span>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                            viewBox="0,0,256,256" style="fill:#000000;">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <g transform="scale(10.66667,10.66667)">
                                    <path
                                        d="M12,2c-5.523,0 -10,4.477 -10,10c0,5.523 4.477,10 10,10c5.523,0 10,-4.477 10,-10c0,-5.523 -4.477,-10 -10,-10zM16,13h-3v3c0,0.552 -0.448,1 -1,1v0c-0.552,0 -1,-0.448 -1,-1v-3h-3c-0.552,0 -1,-0.448 -1,-1v0c0,-0.552 0.448,-1 1,-1h3v-3c0,-0.552 0.448,-1 1,-1v0c0.552,0 1,0.448 1,1v3h3c0.552,0 1,0.448 1,1v0c0,0.552 -0.448,1 -1,1z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </Span>
                    Thêm mới mặt hàng
                </a>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
    {{-- <div class="col-2" style="margin-top: 0px;">
        <div class="accordion">
            <div class="accordion-item" style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-top: none">
                <h2 class="accordion-header" id="heading1">
                    <div style="color: #000000; background: transparent;" class="accordion-button collapsed fw-bold"
                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true"
                        aria-controls="collapse1">
                        <span>Loại Hàng</span>
                    </div>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-item" style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-top: none">
                <h2 class="accordion-header" id="heading2">
                    <div style="color: #000000; background: transparent;" class="accordion-button collapsed fw-bold"
                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true"
                        aria-controls="collapse2">
                        Nhóm Hàng
                    </div>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-item"
                style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-top: none">
                <h2 class="accordion-header" id="heading3">
                    <div style="color: #000000; background: transparent;" class="accordion-button collapsed fw-bold"
                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true"
                        aria-controls="collapse3">
                        Xắp Xếp
                    </div>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                            <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-12" style="margin-top: 20px;">
        <table id="ajax-table-Product" class="table table-hover table-striped text-center m-0">
            <thead class="align-middle" style="background-color: #17770f; color: white">
                <tr class="align-middle text-center fw-bold" style="font-size: 20px">
                    <th scope="col">STT</th>
                    <th scope="col">Mã Mặt Hàng</th>
                    <th scope="col">Tên Mặt Hàng</th>
                    <th scope="col">Đơn Vị Tính</th>
                    <th scope="col">Mã Loại Hàng</th>
                    <th scope="col">Giá Bán</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Mã Thương Hiệu</th>
                    <th scope="col">CHỨC NĂNG</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                {{-- <tr>
                    <td>MH000001</td>
                    <td>Hành Tây</td>
                    <td>Kg</td>
                    <td>LH000001</td>
                    <td>20000</td>
                    <td>
                        <img style="width: 60px; margin: auto" src="{{ env('PATH_IMAGE_PRODUCT_AVT') }}sanpham1.png" alt="" />
                    </td>
                    <td>TH00001</td>
                    <td>
                        <a class="btn btn-primary text-center" href="./ManagerProducts/Edit" style="margin-right: 20px; margin-bottom: 0">
                            <img width="24px"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABeklEQVR4nNXVsU5UURDG8YUeYzB0JBRLQ8IWvIDB2oaEBxALCqx4AunhAQy9UqpZTCwo7E2goHMLDFiQQIkkFpifmTjKzXrv7mEDMUxymrln/t+c79y5t9W6D4FpbGMHC7cNn8U3fMc5LvGkbuM4VtHFXmW9x6MGeDvhZ+hgCocpstAP3/U7eiUCruER65X8VAq+rm6OziPWCm1p4yRBB/iBp/msk3a9qhaELb0R4B08xOcUWc98nGy6WvQp1k3hret8iOynCwGf7S8cKqABXrHlT+ftuuKBApjB1wb4HE5rOy8RwAMc5fGXGjo/qe28UGADVzlEfy0ohg8SyPk4xgfMV3xeKoYPEVisWpNdx0kUw4cIbOECk1jGR/zMO6mFx9T/M/kDBN7lVMa3Rb5JLzExoNkY2m6pwDzeYhOP405GcqN0kkvivwns4MstCfSC1598fpPPdVPgRXKe1Q1Ut+GHs1e4oi4iOGN16mNYSbtGEXgTndfC7zJ+AQTYPuOM4fZdAAAAAElFTkSuQmCC">

                        </a>
                        <a class="btn btn-danger text-center" href="#" style="margin-bottom: 0">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABPElEQVR4nO2UsUpDQRBFo5b5gnSmipUWGjv9gQhqkUIbsVEbS2Ot2ESIhXZqGVEERdIEWxtBu2Bv8APSpFQ4snAXh0B0dw2pcmF4y8zcOY9ldzOZkf4rYAI4ATr8yK1rwPggADv019YgAHUNewHKCrd2qqcMXAW6xKsLLIcALkjXeQggDzSMqQHc9onevsnQbSoaYx7YBWaBFcWccq7mNR80XIApY5wG3oAD8+eHys2YvkIMIGeMC8ArUDWAY+UWTV8uBpA1xhLwBJwawJlyS6YvGwMYAz5lXAMedbo84FK5dfV8OU8wQBD/NGwDD7pwHnClnL/lnajhArRlrgA3wJ0B3APXwL563lMALZmPtNdlff26pJpTKwXQlPnZvEG94WpOzRTApjkhf2kjGiBIBfj4ZbCr7SUNH2lo+gbukw7mXFPP3AAAAABJRU5ErkJggg==">
                        </a>
                    </td>
                </tr> --}}

            </tbody>
        </table>
    </div>
    <!-- Modal cập nhật -->
    <div class="modal fade" id="mat-hang-update" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1000px; width: 800px;">
            <div class="modal-content">
                <form action="javascript:void(0)" id="updateProductFrom" name="updateProductFrom" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa thông tin mặt hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Mã mặt hàng:</label>
                                <input type="text" name="maMH" class="form-control" placeholder="Mã mặt hàng"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên mặt hàng:</label>
                                <input type="text" name="tenMH" class="form-control" placeholder="Tên mặt hàng"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Loại mặt hàng:</label>
                                <select class="form-select" name="maLMH" aria-label="Default select example">

                                    @php
                                        $loai_mat_hang = DB::table('loai_mathang')->get();
                                    @endphp
                                    <option checked>Chọn loại mặt hàng.</option>
                                    @if (isset($loai_mat_hang))
                                        @foreach ($loai_mat_hang as $item)
                                            <option value="{{ $item->MALOAI }}">{{ $item->TENLOAI }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thương hiệu:</label>
                                <select class="form-select" name="maTH" aria-label="Default select example">
                                    @php
                                        $thuong_hieu = DB::table('thuong_hieu')->get();
                                    @endphp
                                    <option checked>Chọn loại thương hiệu.</option>
                                    @if (isset($thuong_hieu))
                                        @foreach ($thuong_hieu as $item)
                                            <option value="{{ $item->MA_TH }}">{{ $item->TEN_TH }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thêm ảnh mặt hàng:</label>
                                <input class="form-control" name="picture" type="file">
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Đơn vị tính:</label>
                                <input class="form-control" name="donvitinh" type="text" list="datalistOptions1"
                                    id="exampleDataList" placeholder="Đơn vị tính..." required>
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
                                <input type="text" name="giaban" class="form-control" placeholder="Giá bán"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Khối lượng:</label>
                                <input type="text" name="khoiluong" class="form-control" placeholder="Khối lượng"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Số gam:</label>
                                <input type="text" name="sogam" class="form-control" placeholder="Số gam" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="" name="mota" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal tạo -->
    <div class="modal fade" id="mat-hang-create" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1000px; width: 800px;">
            <div class="modal-content">
                <form action="javascript:void(0)" id="createProductFrom" name="createProductFrom" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm mặt hàng mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Tên mặt hàng:</label>
                                <input type="text" name="tenMH" class="form-control" placeholder="Tên mặt hàng"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Loại mặt hàng:</label>
                                <select class="form-select" name="maLMH" aria-label="Default select example">

                                    @php
                                        $loai_mat_hang = DB::table('loai_mathang')->get();
                                    @endphp
                                    <option checked>Chọn loại mặt hàng.</option>
                                    @if (isset($loai_mat_hang))
                                        @foreach ($loai_mat_hang as $item)
                                            <option value="{{ $item->MALOAI }}">{{ $item->TENLOAI }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thương hiệu:</label>
                                <select class="form-select" name="maTH" aria-label="Default select example">
                                    @php
                                        $thuong_hieu = DB::table('thuong_hieu')->get();
                                    @endphp
                                    <option checked>Chọn loại thương hiệu.</option>
                                    @if (isset($thuong_hieu))
                                        @foreach ($thuong_hieu as $item)
                                            <option value="{{ $item->MA_TH }}">{{ $item->TEN_TH }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thêm ảnh mặt hàng:</label>
                                <input class="form-control" name="picture" type="file">
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Đơn vị tính:</label>
                                <input class="form-control" name="donvitinh" type="text" list="datalistOptions1"
                                    id="exampleDataList" placeholder="Đơn vị tính..." required>
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
                                <input type="text" name="giaban" class="form-control" placeholder="Giá bán"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Khối lượng:</label>
                                <input type="text" name="khoiluong" class="form-control" placeholder="Khối lượng"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Số gam:</label>
                                <input type="text" name="sogam" class="form-control" placeholder="Số gam" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="mota" name="mota" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="thong-tin-mat-hang-create" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1000px; width: 800px;">
            <div class="modal-content">
                <form action="javascript:void(0)" id="createDataProductFrom" name="createDataProductFrom" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm thông tin mặt hàng mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-12">

                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="text" name="maMH" class="form-control" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tên thông tin:</label>
                                <select class="form-select" id="tenThongTin" name="thongtin"
                                    aria-label="Default select example">
                                    @php
                                        $loai_mat_hang = DB::table('thong_tin_mat_hang')
                                            ->select('TEN_THONG_TIN')
                                            ->groupBy('TEN_THONG_TIN')
                                            ->get();
                                    @endphp
                                    <option checked>Chọn loại mặt hàng.</option>
                                    @if (isset($loai_mat_hang))
                                        @foreach ($loai_mat_hang as $key => $item)
                                            <option value="{{ $item->TEN_THONG_TIN }}">{{ $item->TEN_THONG_TIN }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="thongtinInput" value="" id="thongtin"
                                    class="form-control" placeholder="Tên thông tin..." required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nội dung:</label>
                            <textarea class="form-control" name="mota" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
            </div>

            </form>
        </div>
    </div>

    <div class="modal fade" id="list-image-create" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1000px; width: 800px;">
            <div class="modal-content">
                <form action="javascript:void(0)" id="createListImageProductFrom" name="createListImageProductFrom"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm danh sách ảnh</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-12">

                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="text" name="maMH" class="form-control" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thêm ảnh mặt hàng:</label>
                                <input class="form-control" name="picture" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
            </div>

            </form>
        </div>
    </div>
@endsection
