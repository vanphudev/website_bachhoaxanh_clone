@extends('layouts.page.layout-InforUser')
@section('content')
    <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap align-items-center" style="width: 70%; background: var(--bgcolor-white); border-radius: 5px">
            <div class="p-3">
                <a href="#">
                    <i class="fa-solid fa-house" style=" color: var(--contentcolor);  font-weight: bold; overflow-wrap: break-word;   text-decoration: none;   font-size: 23px; "></i>
                </a>
            </div>
            <div class="breadcrumb-item-text m-auto fw-bold p-2">
                <a href="{{ route('UpdateInfo') }}" style="text-decoration: none; color: var(--contentcolor)">Sửa thông tin cá nhân</a>
            </div>
        </div>
    </div>
    <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search))">
        <div class="form-login mb-3 mt-3" style="width: 70%">
            <h3 class="text-center mb-4 fw-bold">Thông tin tài khoản</h3>
            <form class="ms-5 mx-5" action="{{ route('SetUpdateInfo') }}" method="POST">
                @csrf
                <div class="mb-3 form-login-textbox">
                    <label for="exampleFormControlInput1" class="form-label fw-bold" style="font-size: 20px">Số điện thoại:</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" style="background-color: white; width: 80px"><i class="icon fa-solid fa-phone m-auto" style=" font-size: 25px;background: var(--bgcolor-items); background-clip: text;  color: transparent;  "></i></span>
                        <input id="exampleFormControlInput1" type="text" class="form-control" value="{{ $user->PHONE }}" name="phone" placeholder="Nhập số điện thoại của bạn" required />
                    </div>
                </div>
                <div class="mb-3 form-login-textbox">
                    <label for="exampleFormControlInput1" class="form-label fw-bold" style="font-size: 20px">Họ & Tên:</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" style="background-color: white; width: 80px">
                            <i class="fa-solid fa-user m-auto" style=" font-size: 25px;  background: var(--bgcolor-items); background-clip: text;  color: transparent; "></i></span>
                        <input type="text" class="form-control" value="{{ $user->TENKH }}" name="username" placeholder="Nhập họ và tên của bạn" required />
                    </div>
                </div>
                <div class="mb-3 form-login-textbox">
                    <label for="exampleFormControlInput1" class="form-label fw-bold" style="font-size: 20px">Email:</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" style="background-color: white; width: 80px">
                            <i class="fa-solid fa-envelope m-auto" style="  font-size: 25px; background: var(--bgcolor-items);  background-clip: text;  color: transparent;  "></i></span>
                        <input type="email" class="form-control" value="{{ $user->EMAIL }}" name="email" placeholder="Nhập email của bạn" required />
                    </div>
                </div>
                <label class="form-label fw-bold" style="font-size: 20px">Giới tính:</label>
                <br>
                <div class="w-100 m-auto mb-5 d-flex flex-nowrap justify-content-center gap-5 align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" style="font-size: 20px;" type="radio" name="sex" id="inlineRadio1" value="nam" {{ $user->GIOITINH == 'nam' ? 'checked' : '' }}>
                        <label class="form-check-label" style="font-size: 20px;" for="inlineRadio1">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" style="font-size: 20px;" type="radio" name="sex" id="inlineRadio2" value="nu" {{ $user->GIOITINH == 'nu' ? 'checked' : '' }}>
                        <label class="form-check-label" style="font-size: 20px;" for="inlineRadio2">Nữ</label>
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
@endsection
