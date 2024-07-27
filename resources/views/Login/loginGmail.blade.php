@extends('layouts.page.layout-login')
@section('content')
    <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="form-login mb-5 mt-5" style="box-shadow: 0 26px 58px 0 rgba(0, 0, 0, 0.22), 0 5px 14px 0 rgba(0, 0, 0, 0.18)">
            <p class="content-form-login">
                Để xem "Đơn hàng của bạn" vui lòng <br />
                nhập Gmail đã đặt hàng
            </p>
            @if (session('success'))
                <div class="p-4 text-danger text-center" style="color: red; font-size: 20px; font-weight: bold">{{ session('success') }} !</div>
            @endif
            @if (session('error'))
                <div class="p-4 text-danger text-center" style="color: red; font-size: 20px; font-weight: bold">Đã có lỗi - {{ session('error') }} !</div>
            @endif
            @if (session('message'))
                <div class="p-4 text-danger text-center" style="color: red; font-size: 20px; font-weight: bold">{{ session('message') }}</div>
            @endif
            <form action="{{ route('sendOTPEMmail') }}" method="POST">
                @csrf
                <div class="mb-3 form-login-textbox">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" style="background-color: white">
                            <img src="./folderImages/images/icons/gmail.png" alt="" style="width: 50px; height: 50px;">
                        </span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email của bạn" required />
                    </div>
                </div>
                <button type="submit" class="animate-gradient btn mb-2"
                    style="
                     color: var(--contentcolor-light);
                     width: 100%;
                     font-weight: bold;
                     font-size: 24px;
                     border-radius: 10px;
                  ">
                    Tiếp tục Với Gmail
                </button>
                <hr>
                <div class="form-text mb-4 text-center" style="width: 100%;">
                    <a class="btn btn-outline-success d-flex justify-content-center align-items-center gap-2" href="{{ route('Login') }}" style="color: black;"><i class="icon fa-solid fa-phone"
                            style="
                      font-size: 40px;
                      background: var(--bgcolor-items);
                      background-clip: text;
                      color: transparent;
                   "></i>Đăng nhập bằng Phone.</a>
                </div>
                <div class="form-text mb-4 text-center">
                    Bạn chưa có tài khoản?
                    <a href="{{ route('createAccount') }}">Đăng ký ngay</a>
                </div>
                <div class="form-text">
                    Bằng cách đăng ký tài khoản, bạn đã đồng ý với
                    <a href="">Điều khoản sử dụng và Chính sách bảo mật</a> của Bachoaxanh.com.
                </div>
            </form>
        </div>
    </div>
@endsection
