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
    @if (isset($id))
        @php
            $MA_DH = $id;
            $donHang = DB::table('don_hang')->where('ID_DONHANG', $MA_DH)->first();
            $chitiet_don_hang = DB::table('chitiet_don_hang')->where('ID_DONHANG', $MA_DH)->get();
            $khachHang = DB::table('khachhang')
                ->where('MAKH', $user->MAKH)
                ->first();
        @endphp
        <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search))">
            <div class="mb-3 mt-3 m-auto pb-3 ps-3 px-3 p-5" style="width: 70%; background-color: white; border-radius: 10px">
                <h3>Mã đơn hàng: <span>{{ $donHang->ID_DONHANG }}</span></h3>
                <h4>Ngày đặt hàng: <span>{{ $donHang->NGAYLAP_DH }}</span></h4>
                <div class="container-fluid g-0 p-3 m-auto" style="width: 100%; background-color: rgba(109, 109, 109, 0.452); border-radius: 15px">
                    <h4>Thông tin khách hàng.</h4>
                    <p>Tên khách hàng: <span>{{ $khachHang->TENKH }}</span></p>
                    <p>Eamil: <span>{{ $khachHang->EMAIL }}</span></p>
                    <p>Địa chỉ: <span>{{ $khachHang->DIA_CHI }}</span></p>
                    <p>Hình thức thanh toán: <span>{{ 'Thanh toán tiền mặt khi nhận hàng.' }}</span></p>
                </div>
                <div class="container-fluid g-0 p-3 m-auto mt-3" style="width: 100%; background-color: rgba(109, 109, 109, 0.452); border-radius: 15px">
                    <h4>Thông tin sản phẩm.</h4>
                    @php
                        $thongtin_sanpham = DB::table('mat_hang')
                            ->join('chitiet_don_hang', 'mat_hang.MAMH', '=', 'chitiet_don_hang.MAMH')
                            ->where('chitiet_don_hang.ID_DONHANG', $MA_DH)
                            ->select('mat_hang.TENMH', 'chitiet_don_hang.SOLUONG', 'chitiet_don_hang.THANH_TIEN', 'chitiet_don_hang.THANH_TIEN_KHUYENMAI')
                            ->get();
                    @endphp
                    @foreach ($thongtin_sanpham as $value)
                        <div class="container-fluid g-0 p-3 m-auto mb-3" style="width: 100%;  border-radius: 15px">
                            <h5>Tên sản phẩm: <span>{{ $value->TENMH }}</span></h5>
                            <h5>Số lượng: <span>{{ $value->SOLUONG }}</span></h5>
                            <h5>Thành tiền: <span>{{ $value->THANH_TIEN }}</span></h5>
                            <h5>Tổng tiền được giảm giá: <span>{{ $value->THANH_TIEN_KHUYENMAI }}</span></h5>
                        </div>
                    @endforeach
                </div>
                <div class="container-fluid g-0 p-3 m-auto mt-3" style="width: 100%; background-color: rgba(109, 109, 109, 0.452); border-radius: 15px">
                    <h3>Tổng tiền: <span>{{ $donHang->TONGTIEN_DH }}</span></h3>
                    <h3>Tổng tiền được khuyến mãi: <span>{{ $donHang->TONGTIEN_KHUYENMAI }}</span></h3>
                    <h3>Tổng số lượng sản phẩm: <span>{{ $donHang->TONGTIEN_KHUYENMAI }}</span></h3>
                </div>
            </div>
        </div>
    @endif
@endsection
