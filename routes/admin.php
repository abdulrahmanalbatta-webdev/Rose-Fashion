<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->middleware('localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () {
    Route::prefix('admin')->middleware(['auth', 'admin', 'verified'])->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('/profile-image', [ProfileController::class, 'profile_image'])->name('profile.image');
        Route::delete('/profile-image', [ProfileController::class, 'remove_image'])->name('profile.image.remove');
        Route::get('/Inbox', [AdminController::class, 'inbox'])->name('inbox');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/brands', BrandController::class);
        Route::resource('/products', ProductController::class);
        Route::resource('/orders', OrderController::class);
        Route::resource('/sliders', SliderController::class);
        Route::get('coupons', [AdminController::class, 'coupons'])->name('coupons');
        Route::get('add-coupon', [AdminController::class, 'add_coupon'])->name('add_coupon');
        Route::get('users', [AdminController::class, 'users'])->name('users');
        Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    });
});

Route::get('/avatar', function () {
    $name = request('name', 'U');
    $bg = request('bg', '3F82FC');
    $color = request('color', 'ffffff');
    $size = request('size', 64);

    $words = preg_split('/\s+/u', trim($name));
    if (count($words) >= 2) {
        $initials = mb_strtoupper(
            mb_substr($words[0], 0, 1, 'UTF-8') . mb_substr($words[1], 0, 1, 'UTF-8'),
            'UTF-8'
        );
    } else {
        $initials = mb_strtoupper(mb_substr($name, 0, 2, 'UTF-8'), 'UTF-8');
    }

    $isArabic = preg_match('/\p{Arabic}/u', $name);

    if ($isArabic) {
        $fontPath = public_path('admin/font/Cairo/static/Cairo-Regular.ttf');
        $fontBase64 = base64_encode(file_get_contents($fontPath));
        $fontFamily = 'Cairo';
        $fontSrc = "data:font/truetype;base64,{$fontBase64}";
    } else {
        $fontPath = public_path('admin/font/Poppins/Poppins-Regular.ttf');
        $fontBase64 = base64_encode(file_get_contents($fontPath));
        $fontFamily = 'Poppins';
        $fontSrc = "data:font/truetype;base64,{$fontBase64}";
    }

    $fontSize = $size * 0.35;

    $svg = <<<SVG
        <svg xmlns="http://www.w3.org/2000/svg" width="$size" height="$size" viewBox="0 0 $size $size">
        <defs>
            <style>
            @font-face {
                font-family: '{$fontFamily}';
                src: url('{$fontSrc}') format('truetype');
                font-weight: bold;
            }
            </style>
        </defs>
        <rect width="$size" height="$size" rx="$size" fill="#{$bg}"/>
        <text x="50%" y="54%" dominant-baseline="middle" text-anchor="middle"
                font-family="{$fontFamily}, sans-serif" font-size="{$fontSize}px" fill="#{$color}"
                font-weight="bold">$initials</text>
        </svg>
        SVG;

    return response($svg)->header('Content-Type', 'image/svg+xml');
});
