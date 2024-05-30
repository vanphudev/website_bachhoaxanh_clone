<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupsTypeProductController;
use App\Http\Controllers\TypeProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/GroupProduct', [GroupsTypeProductController::class, 'index']);
Route::get('/TypeProduct', [TypeProductController::class, 'index']);
Route::get('/GroupProduct/{nameGroupTypeProduct}', [GroupsTypeProductController::class, 'groupsTypeProducts']);
Route::get('/TypeProduct/{nameTypeProduct}', [TypeProductController::class, 'typeProducts']);
Route::get('/Product/{nameProduct}', [ProductsController::class, 'products']);
Route::get('/Search', [SearchController::class, 'search']);


Route::get('/Admin', [AdminController::class, 'index']);
Route::get('/ManagerProducts', [ManagerProductsController::class, 'index']);

Route::get('/Login', [LoginController::class, 'index'])->name('Login');
Route::post('/Login', [LoginController::class, 'login'])->name('Login.post');
Route::post('/send-otp', [AuthController::class, 'sendOTP'])->name('sendOtp');


Route::get('/verify-otp', [AuthController::class, 'verifyOtpForm'])->name('verifyOtpForm');
Route::post('/verify-otp', [AuthController::class, 'verifyOTP'])->name('verifyOtp');
// Route::get('/Admin/Order', [AdminController::class, 'index']);
// Route::get('/Admin/NhapHang', [AdminController::class, 'index']);
// Route::get('/Admin/NhapHang', [AdminController::class, 'index']);
