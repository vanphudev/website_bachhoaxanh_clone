@extends('Admin.layouts.layouts-Login')
@section('content')
    <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="{{ route('') }}" method="POST">
            @csrf
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Nhập tên tài khoản của bạn !" required />
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Nhập password của bạn !" required />
            </div>
            <div class="pass"><a href="#">Forgot password?</a></div>
            <div class="row button">
                <input type="submit" value="Login" />
            </div>
            <div class="signup-link">Not a member? <a href="#">Signup now</a></div>
        </form>
    </div>
@endsection
