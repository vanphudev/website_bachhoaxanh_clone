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
                <a href="#" style="text-decoration: none; color: var(--contentcolor)">Cập nhật địa chỉ giao hàng.</a>
            </div>
        </div>
    </div>
    <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search))">
        <div class="mb-3 mt-3 m-auto pb-3 ps-3 px-3" style="width: 70%; background-color: white; border-radius: 10px">
            <div class="form-login mb-3 mt-3" style="width: 70%">
                <h3 class="text-center mb-4 fw-bold">Thông tin địa chỉ giao hàng</h3>
                @if (session('error'))
                    <div class="p-4 text-danger text-center" style="color: red; font-size: 20px; font-weight: bold">{{ session('error') }} !</div>
                @endif
                @if (session('success'))
                    <div class="p-4 text-success text-center" style="color: green; font-size: 20px; font-weight: bold">{{ session('success') }} !</div>
                @endif
                @php
                    if (isset($user)) {
                        $arr = explode('#', $user->DIA_CHI);
                        $tenDuong = $arr[0];
                        $tenTinh = $arr[1];
                        $tenQuanHuyen = $arr[2];
                        $tenXaPhuong = $arr[3];
                    }
                @endphp
                <form class="ms-5 mx-5" action="{{ route('SubmitUpdateAddress') }}" method="POST">
                    @csrf
                    <div class="mb-3 form-login-textbox">
                        <label for="exampleFormControlInput1" class="form-label fw-bold" style="font-size: 20px">Số đường:</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" style="background-color: white; width: 80px"><i class="fa-solid fa-address-book m-auto" style=" font-size: 25px;background: var(--bgcolor-items); background-clip: text;  color: transparent;  "></i></span>
                            <input id="exampleFormControlInput1" type="text" class="form-control" value="{{ $tenDuong }}" name="tenDuong" placeholder="Nhập số điện thoại của bạn" required />
                        </div>
                    </div>
                    <div class="mb-3 form-login-textbox">
                        <label for="exampleFormControlInput1" class="form-label fw-bold" style="font-size: 20px">Tên Tỉnh Thành:</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" style="background-color: white; width: 80px">
                                <i class="fa-solid fa-location-pin m-auto" style=" font-size: 25px;  background: var(--bgcolor-items); background-clip: text;  color: transparent; "></i></span>
                            <input type="text" class="form-control" value="{{ $tenTinh }}" name="tenTinh" placeholder="Nhập tên tỉnh thành." required />
                        </div>
                    </div>
                    <div class="mb-3 form-login-textbox">
                        <label for="exampleFormControlInput1" class="form-label fw-bold" style="font-size: 20px">Tên Quận Huyện:</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" style="background-color: white; width: 80px">
                                <i class="fa-solid fa-location-crosshairs m-auto" style="  font-size: 25px; background: var(--bgcolor-items);  background-clip: text;  color: transparent;  "></i></span>
                            <input type="text" class="form-control" value="{{ $tenQuanHuyen }}" name="tenQuanHuyen" placeholder="Nhập quận huyện." required />
                        </div>
                    </div>
                    <div class="mb-3 form-login-textbox">
                        <label for="exampleFormControlInput1" class="form-label fw-bold" style="font-size: 20px">Tên Xã - Phường:</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" style="background-color: white; width: 80px">
                                <i class="fa-solid fa-location-dot m-auto" style="  font-size: 25px; background: var(--bgcolor-items);  background-clip: text;  color: transparent;  "></i></span>
                            <input type="text" class="form-control" value="{{ $tenXaPhuong }}" name="tenXaPhuong" placeholder="Nhập xã phường." required />
                        </div>
                    </div>
                    <div class="container-fluid g-0 m-auto text-center" style="width: 100%">
                        <button type="submit" class="animate-gradient btn mb-4" style="color: var(--contentcolor-light); font-weight: bold; font-size: 24px; border-radius: 10px">
                            Sửa Đổi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
