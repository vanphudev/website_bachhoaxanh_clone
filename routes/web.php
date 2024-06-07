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
use App\Http\Controllers\ManagerPostProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapNhatDiaChiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UpdateInfoController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ManagerTypeProductController;
use App\Http\Controllers\LoginManagerController;
use App\Http\Controllers\ManagerGroupTypeProductsController;
use App\Http\Controllers\DonHangController;


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


// Xử lí với mặt hàng.
Route::get('/mat-hang', [ManagerProductsController::class, 'index'])->name('ManagerProducts');
Route::post('/mat-hang-create', [ManagerProductsController::class, 'create'])->name('ManagerProductsCreate');
Route::get('/mat-hang-update/{id}', [ManagerProductsController::class, 'update'])->name('ManagerProductsUpdate');
Route::get('/thong-tin-mat-hang-create/{id}', [ManagerProductsController::class, 'addDataProduct'])->name('ManagerAddDataProducts');
Route::post('/thong-tin-mat-hang-create', [ManagerProductsController::class, 'addData'])->name('ManagerAddData');
Route::get('/list-image-mat-hang-create/{id}', [ManagerProductsController::class, 'addListImageProduct'])->name('ManageraddListImageProducts');
Route::post('/list-image-mat-hang-create', [ManagerProductsController::class, 'addListImage'])->name('ManageraddListImage');
Route::post('/mat-hang-edit', [ManagerProductsController::class, 'edit'])->name('ManagerProductsEdit');
Route::get('/mat-hang-delete/{ID}', [ManagerProductsController::class, 'delete'])->name('ManagerProductsDelete');

//xử lý bai viết sản phẩm
Route::get('/bai-viet-mat-hang', [ManagerPostProductController::class, 'index'])->name('ManagerPostProducts');
Route::get('/bai-viet-mat-hang-create/{id}', [ManagerPostProductController::class, 'createPost'])->name('ManagerPostProductsNew');
Route::post('/bai-viet-create', [ManagerPostProductController::class, 'createPostRequest'])->name('ManagerPostProductsCreate');
Route::get('/chi-tiet-bai-viet-create/{id}', [ManagerPostProductController::class, 'createPostDetail'])->name('ManagerPostDetail');
Route::post('/chi-tiet-bai-viet-item', [ManagerPostProductController::class, 'createPostDetailRequest'])->name('ManagerPostDetaiCreate');

Route::get('/chi-tiet-bai-viet-delete/{ID}', [ManagerPostProductController::class, 'delete'])->name('ManagerPostDelete');

// Xử lí với nhóm loại mặt hàng.
Route::get('/loai-mat-hang', [ManagerTypeProductController::class, 'index'])->name('ManagerTypeProduct');
Route::post('/loai-mat-hang-create', [ManagerTypeProductController::class, 'create'])->name('ManagerTypeProductCreate');
Route::get('/loai-mat-hang-update/{id}', [ManagerTypeProductController::class, 'update'])->name('ManagerTypeProductUpdate');
Route::post('/loai-mat-hang-edit', [ManagerTypeProductController::class, 'edit'])->name('ManagerTypeProductEdit');
Route::get('/loai-mat-hang-delete/{ID}', [ManagerTypeProductController::class, 'delete'])->name('ManagerTypeProductDelete');


// Xử lí với nhân viên.
Route::get('/nhan-vien', [ManagerEmployeesController::class, 'index'])->name('ManagerEmployees');
Route::post('/nhan-vien-create', [ManagerGroupTypeProductsController::class, 'create'])->name('ManagerEmployeesCreate');
Route::get('/nhan-vien-update/{id}', [ManagerGroupTypeProductsController::class, 'update'])->name('ManagerEmployeesUpdate');
Route::post('/nhan-vien-edit', [ManagerGroupTypeProductsController::class, 'edit'])->name('ManagerEmployeesEdit');
Route::get('/nhan-vien-delete/{ID}', [ManagerGroupTypeProductsController::class, 'delete'])->name('ManagerEmployeesDelete');


// Xử lí với nhóm loại mặt hàng.
Route::get('/nhom-loai-mat-hang', [ManagerGroupTypeProductsController::class, 'index'])->name('ManagerGroupTypeProducts');
Route::post('/nhom-loai-mat-hang-create', [ManagerGroupTypeProductsController::class, 'create'])->name('ManagerGroupTypeProductsCreate');
Route::get('/nhom-loai-mat-hang-update/{id}', [ManagerGroupTypeProductsController::class, 'update'])->name('ManagerGroupTypeProductsUpdate');
Route::post('/nhom-loai-mat-hang-edit', [ManagerGroupTypeProductsController::class, 'edit'])->name('ManagerGroupTypeProductsEdit');
Route::get('/nhom-loai-mat-hang-delete/{ID}', [ManagerGroupTypeProductsController::class, 'delete'])->name('ManagerGroupTypeProductsDelete');


// Đăng nhập.
Route::get('/Login', [LoginController::class, 'index'])->name('Login');
// Đăng nhập bằng Gmail.
Route::get('/LoginGmail', [LoginController::class, 'loginGmail'])->name('loginGmail');
// Xác thực OTP đăng nhập.
Route::post('/send-otp', [AuthController::class, 'sendOTP'])->name('sendOtp');
// Xác thực OTP đăng nhập.
Route::get('/verify-otp', [AuthController::class, 'verifyOtpForm'])->name('verifyOtpForm');
Route::post('/verify-otp', [AuthController::class, 'verifyOTP'])->name('verifyOTP');
// Tạo tài khoản.
Route::get('/createAccount', [LoginController::class, 'createAccount'])->name('createAccount');
Route::post('/verifyAccount', [LoginController::class, 'verifyAccount'])->name('verifyAccount');
// Xác thực OTP tạo tài khoản.
Route::get('/verify-otp-createAccount', [LoginController::class, 'verifyOtpCreateAccount'])->name('verify-otp-createAccount');
Route::post('/verify-otp-createAccount', [LoginController::class, 'verifyOtpCreateAccountOTP'])->name('verify-otp-createAccount-OTP');


Route::get('/cap-nhat-thong-tin', [UpdateInfoController::class, 'index'])->name('UpdateInfo');
Route::post('/cap-nhat-thong-tin', [UpdateInfoController::class, 'update'])->name('SetUpdateInfo');
Route::get('/cap-nhat-dia-chi', [CapNhatDiaChiController::class, 'index'])->name('UpdateAddress');
Route::post('/cap-nhat-dia-chi-update', [CapNhatDiaChiController::class, 'update'])->name('SubmitUpdateAddress');


// Giỏ hàng
Route::get('/cart', [CardsController::class, 'index'])->name('Cart');
// Cập nhật sản phẩm vào giỏ hàng.
Route::get('/UpdateToCart/{mamh}/{action}', [CardsController::class, 'UpdateToCart'])->name('UpdateToCart');
// Thêm sản phẩm vào giỏ hàng.
Route::post('/AddToCart', [CardsController::class, 'AddToCart'])->name('AddToCart');
// Xóa sản phẩm trong giỏ hàng.
Route::get('/DeleteCart/{mamh}', [CardsController::class, 'RemoveProductFromCart'])->name('DeleteCart');


// Đặt hàng
Route::get('/dat-hang', [DonHangController::class, 'index'])->name('Order');
