<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupsTypeProductController;
use App\Http\Controllers\TypeProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerEmployeesController;
use App\Http\Controllers\ManagerCustommersController;
use App\Http\Controllers\ManagerSuppliersController;
use App\Http\Controllers\ManagerBrandsController;
use App\Http\Controllers\ManagerProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UpdateInfoController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ManagerTypeProductController;
use App\Http\Controllers\LoginManagerController;
use App\Http\Controllers\ManagerGroupTypeProductsController;


Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::get('/GroupProduct', [GroupsTypeProductController::class, 'index']);
Route::get('/TypeProduct', [TypeProductController::class, 'index']);
Route::get('/GroupProduct/{nameGroupTypeProduct}', [GroupsTypeProductController::class, 'groupsTypeProducts']);
Route::get('/TypeProduct/{nameTypeProduct}', [TypeProductController::class, 'typeProducts']);
Route::get('/Product/{nameProduct}', [ProductsController::class, 'products']);
Route::get('/Search', [SearchController::class, 'search']);


// Trang quản lí Admin và các trang quản lí.
Route::get('/admin-login', [LoginManagerController::class, 'index'])->name('LoginAdmin');
Route::get('/Admin', [AdminController::class, 'index'])->name('Dashboard');
Route::get('/ManagerProducts', [ManagerProductsController::class, 'index'])->name('ManagerProducts');

<<<<<<< HEAD

// Xử lí với nhóm loại mặt hàng.
Route::get('/ManagerTypeProduct', [ManagerTypeProductController::class, 'index'])->name('ManagerTypeProduct');
Route::post('/TypeProductGetById', [ManagerTypeProductController::class, 'getID'])->name('TypeProductGetById');
Route::post('/ManagerTypeProductCreate', [ManagerTypeProductController::class, 'create'])->name('ManagerTypeProductCreate');
Route::post('/TypeProductUpdate', [ManagerTypeProductController::class, 'update'])->name('TypeProductUpdate');
Route::post('/ManagerTypeProductDelete', [ManagerTypeProductController::class, 'delete'])->name('ManagerTypeProductDelete');

// Xử lí với nhân viên.
Route::get('/ManagerEmployees', [ManagerEmployeesController::class, 'index'])->name('ManagerEmployees');

// Xử lí với nhóm loại mặt hàng.
=======
Route::get('/ManagerTypeProduct', [ManagerTypeProductController::class, 'index'])->name('ManagerTypeProduct');

Route::get('/ManagerEmployees', [ManagerEmployeesController::class, 'index'])->name('ManagerEmployees');


Route::get('/ManagerCustommers', [ManagerCustommersController::class, 'index'])->name('ManagerCustommers');
Route::get('/ManagerCustommers/create', [ManagerCustommersController::class, 'create'])->name('ManagerCustommers');
Route::get('/ManagerCustommers/edit', [ManagerCustommersController::class, 'edit'])->name('ManagerCustommers');

Route::get('/ManagerSuppliers', [ManagerSuppliersController::class, 'index'])->name('ManagerSuppliers');
Route::get('/ManagerSuppliers/create', [ManagerSuppliersController::class, 'create'])->name('ManagerSuppliers');
Route::get('/ManagerSuppliers/edit', [ManagerSuppliersController::class, 'edit'])->name('ManagerSuppliers');

Route::get('/ManagerBrands', [ManagerBrandsController::class, 'index'])->name('ManagerBrands');
Route::get('/ManagerBrands/create', [ManagerBrandsController::class, 'create'])->name('ManagerBrands');
Route::get('/ManagerBrands/edit', [ManagerBrandsController::class, 'edit'])->name('ManagerBrands');

>>>>>>> a498e1eca679cefda634adfbef26fcde243da828
Route::get('/ManagerGroupTypeProducts', [ManagerGroupTypeProductsController::class, 'index'])->name('ManagerGroupTypeProduct');


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