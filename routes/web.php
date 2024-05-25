<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupsTypeProductController;
use App\Http\Controllers\TypeProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/GroupProduct', [GroupsTypeProductController::class, 'index']);
Route::get('/TypeProduct', [TypeProductController::class, 'index']);
Route::get('/GroupProduct/{nameGroupTypeProduct}', [GroupsTypeProductController::class, 'groupsTypeProducts']);
Route::get('/TypeProduct/{nameTypeProduct}', [TypeProductController::class, 'typeProducts']);
Route::get('/Product/{nameProduct}', [ProductsController::class, 'products']);
Route::get('/Search', [SearchController::class, 'search']);
