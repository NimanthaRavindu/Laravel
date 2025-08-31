<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\LogoutController;

Route::get('/', function () {
    return view('layout');
});

Route::resource("/products",ProductController::class);

Route::resource("/customers",CustomerController::class);

Route::resource("/reports",ReportsController::class);

Route::resource("/billing",BillingController::class);

Route::resource("/auth",AuthController::class);

Route::resource("/menu-items",MenuItemController::class);