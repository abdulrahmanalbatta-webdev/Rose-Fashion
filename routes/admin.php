<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/brands', BrandController::class);
    Route::resource('/orders', OrderController::class);
    Route::get('sliders', [AdminController::class, 'sliders'])->name('sliders');
    Route::get('add-slider', [AdminController::class, 'add_slider'])->name('add_slider');
    Route::get('coupons', [AdminController::class, 'coupons'])->name('coupons');
    Route::get('add-coupon', [AdminController::class, 'add_coupon'])->name('add_coupon');
    Route::get('users', [AdminController::class, 'users'])->name('users');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
});
