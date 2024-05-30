<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupsTypeProductController;
use App\Http\Controllers\TypeProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerProductsController;
use App\Http\Controllers\ManagerTypeProductController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/GroupProduct', [GroupsTypeProductController::class, 'index']);
Route::get('/TypeProduct', [TypeProductController::class, 'index']);
Route::get('/GroupProduct/{nameGroupTypeProduct}', [GroupsTypeProductController::class, 'groupsTypeProducts']);
Route::get('/TypeProduct/{nameTypeProduct}', [TypeProductController::class, 'typeProducts']);
Route::get('/Product/{nameProduct}', [ProductsController::class, 'products']);
Route::get('/Search', [SearchController::class, 'search']);


Route::get('/Admin', [AdminController::class, 'index']);
Route::get('/ManagerProducts', [ManagerProductsController::class, 'index']);
Route::get('/ManagerProducts/Create', [ManagerProductsController::class, 'create']);
Route::get('/ManagerProducts/Edit', [ManagerProductsController::class, 'edit']);
Route::get('/ManagerTypeProduct', [ManagerTypeProductController::class, 'index']);
Route::get('/ManagerProducts/Create', [ManagerTypeProductController::class, 'create']);
Route::get('/ManagerProducts/Edit', [ManagerTypeProductController::class, 'edit']);

// Route::get('/Admin/Order', [AdminController::class, 'index']);
// Route::get('/Admin/NhapHang', [AdminController::class, 'index']);
// Route::get('/Admin/NhapHang', [AdminController::class, 'index']);