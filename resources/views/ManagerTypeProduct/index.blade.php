@extends('Admin.layouts.layouts-TypeProduct')
@section('content')
    <div class="col" style="margin-top: 20px;">
        <div class="container-fluid g-0 m-0 p-3 mb-5" style="position: sticky; top: 0px; z-index: 1000; background-color: white; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;">
            <h3 style="margin-bottom: 20px;">Loại mặt hàng</h3>
            <div class="mb-3" style="width: 500px; float: left;">
                <input type="text" class="form-control" placeholder="Theo mã, tên loại mặt hàng">
            </div>
            <div style="display: flex; flex-wrap: wrap; float: right; ">
                <a class="btn btn-success" href="./ManagerTypeProduct" style="margin-right: 20px;">
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
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loai-mat-hang-create">
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
                    Thêm mới loại mặt hàng
                </button>
            </div>
            <div style="clear: both;"></div>
            <div>
                <p style="font-size: 25px; font-weight: bold; ">
                    Danh sách loại mặt hàng sản phẩm có trong cửa hàng tổng cộng có {{ count($type_products) }} loại mặt hàng
                </p>
            </div>
        </div>
        <table id="table" class="table table-hover table-striped text-center">
            <thead style="background-color: #17770f; color: white">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã Loại</th>
                    <th scope="col">Tên Loại</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Mã Nhóm Loại</th>
                    <th scope="col">Tên Nhóm Loại</th>
                    <th scope="col">Top Mua Sản Phẩm</th>
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @if (isset($type_products))
                    @foreach ($type_products as $key => $values)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $values->MALOAI }}</td>
                            <td>{{ $values->TENLOAI }}</td>
                            <td>
                                <img style="width: 60px; margin: auto" src="{{ env('PATH_IMAGE_TYPE_PRODUCT') }}{{ $values->PICTURE }}" alt="" />
                            </td>
                            <td>{{ $values->MANHOM_LOAI }}</td>
                            <td>{{ $values->TENNHOM_LOAI }}</td>
                            <td>{{ $values->TOP_MUASAM == 1 && $values->TOP_MUASAM != null ? 'TOP' : 'NO' }}</td>
                            <td>
                                <button class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#loai-mat-hang-update" style="margin-right: 20px; margin-bottom: 0">
                                    <img width="24px"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABeklEQVR4nNXVsU5UURDG8YUeYzB0JBRLQ8IWvIDB2oaEBxALCqx4AunhAQy9UqpZTCwo7E2goHMLDFiQQIkkFpifmTjKzXrv7mEDMUxymrln/t+c79y5t9W6D4FpbGMHC7cNn8U3fMc5LvGkbuM4VtHFXmW9x6MGeDvhZ+hgCocpstAP3/U7eiUCruER65X8VAq+rm6OziPWCm1p4yRBB/iBp/msk3a9qhaELb0R4B08xOcUWc98nGy6WvQp1k3hret8iOynCwGf7S8cKqABXrHlT+ftuuKBApjB1wb4HE5rOy8RwAMc5fGXGjo/qe28UGADVzlEfy0ohg8SyPk4xgfMV3xeKoYPEVisWpNdx0kUw4cIbOECk1jGR/zMO6mFx9T/M/kDBN7lVMa3Rb5JLzExoNkY2m6pwDzeYhOP405GcqN0kkvivwns4MstCfSC1598fpPPdVPgRXKe1Q1Ut+GHs1e4oi4iOGN16mNYSbtGEXgTndfC7zJ+AQTYPuOM4fZdAAAAAElFTkSuQmCC">

                                </button>
                                <button id="btnDelete" class="btn btn-danger text-center" style="margin-bottom: 0">
                                    <img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABPElEQVR4nO2UsUpDQRBFo5b5gnSmipUWGjv9gQhqkUIbsVEbS2Ot2ESIhXZqGVEERdIEWxtBu2Bv8APSpFQ4snAXh0B0dw2pcmF4y8zcOY9ldzOZkf4rYAI4ATr8yK1rwPggADv019YgAHUNewHKCrd2qqcMXAW6xKsLLIcALkjXeQggDzSMqQHc9onevsnQbSoaYx7YBWaBFcWccq7mNR80XIApY5wG3oAD8+eHys2YvkIMIGeMC8ArUDWAY+UWTV8uBpA1xhLwBJwawJlyS6YvGwMYAz5lXAMedbo84FK5dfV8OU8wQBD/NGwDD7pwHnClnL/lnajhArRlrgA3wJ0B3APXwL563lMALZmPtNdlff26pJpTKwXQlPnZvEG94WpOzRTApjkhf2kjGiBIBfj4ZbCr7SUNH2lo+gbukw7mXFPP3AAAAABJRU5ErkJggg==">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <!-- Modal cập nhật -->
    <div class="modal fade" id="loai-mat-hang-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 100px">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin mặt hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Mã mặt hàng:</label>
                            <input type="text" name="ma" class="form-control" placeholder="Mã loại mặt hàng tạo tự động" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên mặt hàng:</label>
                            <input type="text" name="tenMH" class="form-control" placeholder="Tên mặt hàng" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mã nhóm loại mặt hàng:</label>
                            <input type="text" name="" class="form-control" placeholder="Mã nhóm loại mặt hàng" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Thêm ảnh mặt hàng:</label>
                            <input class="form-control" name="" type="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Sữa thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal tạo -->
    <div class="modal fade" id="loai-mat-hang-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mặt hàng mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Mã mặt hàng:</label>
                            <input type="text" name="" class="form-control" placeholder="Mã loại mặt hàng tạo tự động" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên mặt hàng:</label>
                            <input type="text" name="" class="form-control" placeholder="Tên mặt hàng" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mã nhóm loại mặt hàng:</label>
                            <input type="text" name="" class="form-control" placeholder="Mã nhóm loại mặt hàng" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Thêm ảnh mặt hàng:</label>
                            <input class="form-control" name="" type="file" required>
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
@endsection
