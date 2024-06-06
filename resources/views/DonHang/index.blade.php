@extends('layouts.page.layout-cards')
@section('content')
    <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap align-items-center" style="width: 70%; background: var(--bgcolor-white); border-radius: 5px">
            <div class="p-3">
                <a href="/">
                    <i class="fa-solid fa-house" style=" color: var(--contentcolor);font-weight: bold; overflow-wrap: break-word;text-decoration: none;font-size: 23px;"></i>
                </a>
            </div>
            <div class="breadcrumb-item-text m-auto fw-bold p-2">
                <a href="{{ route('Order') }}" style="text-decoration: none; color: var(--contentcolor)">Thông tin đơn đặt hàng</a>
            </div>
        </div>
    </div>
    <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search))">
        <div class="mb-3 mt-3 m-auto pb-3 ps-3 px-3 p-5" style="width: 70%; background-color: white; border-radius: 10px">
            <h3>Mã đơn hàng: <span>{{ $MA_DH }}</span></h3>
            <h4>Ngày đặt hàng: <span>{{ $ }}</span></h4>
            'user' => $user,
            'detail_cart' => $detail_cart,
            'total' => $total,
            'total_km' => $total_km,
            'total_sl' => $total_sl,
            'MA_DH' => $MA_DH
            <div class="container-fluid g-0 p-3 m-auto" style="width: 100%; background-color: rgba(109, 109, 109, 0.452); border-radius: 15px">
                <h4>Thông tin khách hàng.</h4>
                <p>Tên khách hàng: <span>{{ }}</span></p>
                <p>Số điện thoại: <span>{{ }}</span></p>
                <p>Địa chỉ: <span>{{ }}</span></p>
                <p>Hình thức thanh toán: <span>{{ }}</span></p>
            </div>
            <div class="container-fluid g-0 p-3 m-auto mt-3" style="width: 100%; background-color: rgba(109, 109, 109, 0.452); border-radius: 15px">
                <h4>Thông tin sản phẩm.</h4>
                <div class="container-fluid g-0 p-3 m-auto" style="width: 100%; background-color: rgba(109, 109, 109, 0.452); border-radius: 15px">
                    <h5>Tên sản phẩm: <span>{{ }}</span></h5>
                    <h5>Giá: <span>{{ }}</span></h5>
                    <h5>Giá khuyến mãi (Nếu có): <span>{{ }}</span></h5>
                    <h5>Số lượng: <span>{{ }}</span></h5>
                    <h5>Thành tiền: <span>{{ }}</span></h5>
                </div>
            </div>
        </div>
    </div>
@endsection
