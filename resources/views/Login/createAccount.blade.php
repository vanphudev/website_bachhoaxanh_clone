@extends('layouts.page.layout-login')
@section('content')
    <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="form-login mb-5 mt-5" style="box-shadow: 0 26px 58px 0 rgba(0, 0, 0, 0.22), 0 5px 14px 0 rgba(0, 0, 0, 0.18)">
            <p class="content-form-login">
                Để xem "Trải nghiệm dịch vụ tốt hơn" vui lòng <br />
                Tạo tài khoản dành riêng cho bạn.
            </p>
            @if (session('error'))
                <div class="p-4 text-danger text-center" style="color: red; font-size: 20px; font-weight: bold">{{ session('error') }} !</div>
            @endif
            @if ($errors->any())
                <div class="p-4 text-danger text-center" style="color: red; font-size: 20px; font-weight: bold">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('verifyAccount') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label fw-bold">Full Name: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="username" value="{{ old('username') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label fw-bold">Phone: </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="phone" value="{{ old('phone') }}" required>
                    </div>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-3 pt-0 fw-bold">Giới tính: </legend>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="" value="nam" {{ old('sex') == 'nam' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="gridRadios1">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="" value="nu" {{ old('sex') == 'nu' ? 'checked' : '' }}required>
                            <label class="form-check-label" for="gridRadios2">
                                Nữ
                            </label>
                        </div>
                    </div>
                </fieldset>
                <div class="row mb-3 ms-4 mx-4">
                    <button type="submit" class="btn btn-outline-success" href="">Đăng ký tài khoản</button>
                </div>
            </form>
            <div class="form-text mb-4 text-center">
                Bạn đã có tài khoản?
                <a href="{{ route('Login') }}">Đăng nhập ngay</a>
            </div>
            <div class="form-text">
                Bằng cách đăng ký tài khoản, bạn đã đồng ý với
                <a href="">Điều khoản sử dụng và Chính sách bảo mật</a> của Bachoaxanh.com.
            </div>
        </div>
    </div>
@endsection
