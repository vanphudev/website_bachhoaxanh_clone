@extends('layouts.page.layout-cards')
@section('content')
    <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap align-items-center" style="width: 70%; background: var(--bgcolor-white); border-radius: 5px">
            <div class="p-3">
                <a href="#">
                    <i class="fa-solid fa-house" style=" color: var(--contentcolor);font-weight: bold; overflow-wrap: break-word;text-decoration: none;font-size: 23px;"></i>
                </a>
            </div>
            <div class="breadcrumb-item-text m-auto fw-bold p-2">
                <a href="#" style="text-decoration: none; color: var(--contentcolor)">Thông tin giỏ hàng</a>
            </div>
        </div>
    </div>
    <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search))">
        <div class="mb-3 mt-3 m-auto pb-3 ps-3 px-3" style="width: 70%; background-color: white; border-radius: 10px">
            @if (isset($user) && isset($cart) && isset($detail_cart) && $count > 0)
                <div class="container-fluid g-0 m-auto p-3 mb-5 d-flex gap-4 flex-nowrap align-items-center justify-content-center"
                    style=" border-top: 5px solid white; position: sticky; top: 105px; z-index: 800;  width: 100%;  box-shadow: 0 19px 38px rgba(37, 97, 64, 0.3), 0 15px 12px rgba(0, 124, 42, 0.22); border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; background: var(--bgcolor-card); ">
                    <div class="text-center w-50" style="z-index: 99">
                        <h4 class="fw-bold" style="color: white">Tổng số sản phẩm trong giỏ</h4>
                        <h5 class="fw-bold" style="color: white">
                            Có <span id="soLuongCard" style="color: #ebb319; font-size: 40px"> {{ $count }} </span> sản phẩm trong giỏ
                        </h5>
                    </div>
                    <div class="text-center w-50" style="z-index: 99">
                        <h4 class="fw-bold" style="color: white">Tổng tiền tiền khi thanh toán</h4>
                        <h5 class="fw-bold" style="color: white">
                            <span id="tongTienCard" style="color: #ebb319; font-size: 40px">{{ format_currency_vnd($tongtien) }}</span>
                        </h5>
                    </div>
                </div>
                <div class="container-fluid g-0 m-auto mb-3" style="width: 100%; border-radius: 8px; background-color: #e9eaeb; padding: 18px; z-index: -1">
                    <div>
                        <h4 class="fw-bold">Dánh sách các sản phẩm.</h4>
                        <p class="m-0 text-success fw-bold text-center">
                            Nếu tồn kho có thay đổi, BHX sẽ liên hệ trước khi giao hàng
                        </p>
                    </div>
                </div>
                @foreach ($detail_cart as $key => $valueProduct)
                    @if (isset($valueProduct))
                        <div class="container-fluid g-0 m-auto mb-3" style="  width: 100%; border-radius: 8px;  background-color: #e9eaeb; padding: 18px;  z-index: 99;  position: relative;  ">
                            <div class="row">
                                <div class="col-3 d-flex justify-content-center align-items-center">
                                    <img src="{{ env('PATH_IMAGE_PRODUCT_AVT') }}{{ $valueProduct->PICTURE }}" alt="" style="  width: 100%;  height: 130px;  object-fit: cover; border-radius: 15px; box-shadow: 0px 25px 20px -20px rgba(0, 0, 0, 0.45);  " />
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-6 d-flex justify-content-start align-items-center flex-column">
                                            <h4 class="fw-bold mb-3">{{ $valueProduct->TENMH }}</h4>
                                            <p class="fw-bold m-0" style="font-size: 25px; color: red">Giá bán: {{ format_currency_vnd($valueProduct->GIA_BAN_NEW) }}</p>
                                            @if ($valueProduct->TILE_GIAM_GIA != null)
                                                <div class="badge bg-danger p-2">Giảm giá -{{ $valueProduct->TILE_GIAM_GIA }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 d-flex flex-column justify-content-end gap-1 align-items-center">
                                            <div class="d-flex justify-content-end align-items-center">
                                                <a href="javascript:void(0)" onclick="deleteItemCards('{{ $valueProduct->MAMH }}')" class="btn btn-danger d-flex justify-content-center align-items-center"
                                                    style="position: absolute; right: 7px; top: 7px; border-radius: 50%; width: 30px; height: 30px; box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </a>
                                            </div>
                                            <h5 class="m-0 fw-bold">Số lượng sản phẩm</h5>
                                            <div class="form-tangGiam d-flex justify-content-start align-items-center">
                                                <a href="javascript:void(0)" id="tang" onclick="updateSoLuong('{{ $valueProduct->MAMH }}', 'tang')" class="btn fw-bold d-flex justify-content-center align-items-center" style="background-color: #469c4b; width: 40px; height: 40px; border-radius: 50%">
                                                    <i class="fa-solid fa-plus" style="font-weight: bold; font-size: 25px; color: white"></i>
                                                </a>
                                                <input id="soluong" type="text" value="{{ $valueProduct->SOLUONG }}" class="form-control" style="width: 70px; height: 40px; text-align: center; margin-left: 4px; margin-right: 4px; font-size: 25px;" />
                                                <a id="giam" href="javascript:void(0)" onclick="updateSoLuong('{{ $valueProduct->MAMH }}', 'giam')" class="btn fw-bold d-flex justify-content-center align-items-center" style="background-color: #469c4b; width: 40px; height: 40px; border-radius: 50%">
                                                    <i class="fa-solid fa-minus" style="font-weight: bold; font-size: 25px; color: white"></i>
                                                </a>
                                            </div>
                                            <h5 id="tongThanhTien" class="m-0 fw-bold mt-2 p-2" style="background: var(--bgcolor-items); border-radius: 10px; color: white">
                                                {{ format_currency_vnd($valueProduct->THANH_TIEN) }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="container-fluid g-0 m-auto d-flex flex-column align-items-center justify-content-center" style="width: 100%">
                    <img src="../folderImages/images/icons/giohang.png" alt="Icon" style="width: 30%" />
                    <p style="font-size: 25px; text-align: center">Giỏ hàng của bạn đang trống !</p>
                    <a href="./" class="btn btn-success fw-bold">Tiếp tục mua hàng</a>
                </div>
            @endif
        </div>
    </div>
    @if (isset($user) && isset($cart) && isset($detail_cart) && $count > 0)
        <div class="container-fluid g-0 m-auto p-3" style=" width: 400px; position: fixed;  top: 120px;  right: 30px; max-height: 85vh; overflow: auto; background-color: white; border-radius: 10px; z-index: 99; box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3), 0 15px 12px rgba(0, 0, 0, 0.22); ">
            <h3 class="fw-bold">Thông tin thanh toán</h3>
            <h6 class="float-end">Tổng tiền đơn hàng:
                <span id="tongTienCardTwo" class="fw-bold">
                    {{ format_currency_vnd($tongtien) }}.
                </span>
            </h6>
            <div class="clearfix"></div>
            <h6 class="float-end">Tổng số lượng sản phẩm: <span id="soLuongCardTwo" class="fw-bold"> {{ $count }} </span></h6>
            <div class="clearfix"></div>
            <h6 class="float-end">Phụ phí/Phí giao hàng: <span class="fw-bold text-danger">Miễn Phí.</span></h6>
            <div class="clearfix mb-3"></div>
            <hr />
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label fw-bold">Ghi chú cho đơn hàng (Nếu có):</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-4 d-flex justify-content-around align-items-center">
                <h5 class="fw-bold float-start m-0">Hình thức thanh toán:</h5>
            </div>
            <div class="clearfix mb-3"></div>
            <div class="mb-4 d-flex justify-content-center gap-3 align-items-center">
                <i class="fa-regular fa-credit-card" style="font-size: 20px"></i>
                <h6 class="fw-bold m-0">Thanh toán khi nhận hàng (COD)</h6>
            </div>
            <a href="javascript:void(0)" onclick="thanhToanGiohang()" class="animate-gradient btn d-flex justify-content-center align-items-center" style=" color: var(--contentcolor-light); width: 100%; font-weight: bold; font-size: 18px; border-radius: 10px;  ">
                <span><i class="fa-solid fa-truck-moving mx-3"></i>ĐẶT HÀNG NGAY {{ format_currency_vnd($tongtien) }}</span>
            </a>
        </div>
    @endif
@endsection
<script>
    function thanhToanGiohang() {
        Swal.fire({
            title: 'Bạn có chắc chắn muốn đặt hàng không?',
            text: "Hãy kiểm tra kỹ thông tin trước khi đặt hàng!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đặt hàng ngay',
            cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('Order') }}';
            }
        });
    }
</script>
