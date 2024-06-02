<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupsTypeProductController;
use App\Http\Controllers\TypeProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerEmployeesController;
use App\Http\Controllers\ManagerProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UpdateInfoController;
use App\Http\Controllers\CardsController;


Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::get('/GroupProduct', [GroupsTypeProductController::class, 'index']);
Route::get('/TypeProduct', [TypeProductController::class, 'index']);
Route::get('/GroupProduct/{nameGroupTypeProduct}', [GroupsTypeProductController::class, 'groupsTypeProducts']);
Route::get('/TypeProduct/{nameTypeProduct}', [TypeProductController::class, 'typeProducts']);
Route::get('/Product/{nameProduct}', [ProductsController::class, 'products']);
Route::get('/Search', [SearchController::class, 'search']);


Route::get('/Admin', [AdminController::class, 'index']);
Route::get('/ManagerProducts', [ManagerProductsController::class, 'index']);

// Đăng nhập.
Route::get('/Login', [LoginController::class, 'index'])->name('Login');
// Đăng nhập bằng Gmail.
Route::get('/LoginGmail', [LoginController::class, 'loginGmail'])->name('loginGmail');
// Xác thực OTP đăng nhập.
Route::post('/send-otp', [AuthController::class, 'sendOTP'])->name('sendOtp');


// Tạo tài khoản.
Route::get('/createAccount', [LoginController::class, 'createAccount'])->name('createAccount');
Route::post('/verifyAccount', [LoginController::class, 'verifyAccount'])->name('verifyAccount');

// Xác thực OTP đăng nhập.
Route::get('/verify-otp', [AuthController::class, 'verifyOtpForm'])->name('verifyOtpForm');
Route::post('/verify-otp', [AuthController::class, 'verifyOTP'])->name('verifyOTP');

// Xác thực OTP tạo tài khoản.
Route::get('/verify-otp-createAccount', [LoginController::class, 'verifyOtpCreateAccount'])->name('verify-otp-createAccount');
Route::post('/verify-otp-createAccount', [LoginController::class, 'verifyOtpCreateAccountOTP'])->name('verify-otp-createAccount-OTP');

// Route::get('/Admin/Order', [AdminController::class, 'index']);
// Route::get('/Admin/NhapHang', [AdminController::class, 'index']);
// Route::get('/Admin/NhapHang', [AdminController::class, 'index']);


Route::get('/cap-nhat-thong-tin', [UpdateInfoController::class, 'index'])->name('UpdateInfo');
Route::post('/cap-nhat-thong-tin', [UpdateInfoController::class, 'update'])->name('SetUpdateInfo');


// Giỏ hàng
Route::get('/cart', [CardsController::class, 'index'])->name('Cart');
Route::post('/AddToCart', [CardsController::class, 'AddToCart'])->name('AddToCart');
// Xóa sản phẩm trong giỏ hàng.
Route::get('/cart/delete', [CardsController::class, 'RemoveProductFromCart'])->name('DeleteCart');
