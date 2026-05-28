<?php

use App\Http\Controllers\Website\AppController;
use Illuminate\Support\Facades\Route;


Route::name('fashion.')->group(function () {
    Route::get('/', [AppController::class, 'index'])->name('index');
    Route::get('/shop', [AppController::class, 'shop'])->name('shop');
    Route::get('/about', [AppController::class, 'about'])->name('about');
    Route::get('/contact', [AppController::class, 'contact'])->name('contact');
    Route::get('/cart', [AppController::class, 'cart'])->name('cart');
    Route::get('/checkout', [AppController::class, 'checkout'])->name('checkout');
    Route::get('/order-confirmation', [AppController::class, 'order_confirmation'])->name('order_confirmation');
    Route::get('/wishlist', [AppController::class, 'wishlist'])->name('wishlist');
    Route::get('/login', [AppController::class, 'login'])->name('login');
    Route::get('/register', [AppController::class, 'register'])->name('register');
    Route::get('/my-account', [AppController::class, 'my_account'])->name('my_account');
    Route::get('/account-orders', [AppController::class, 'account_orders'])->name('account_orders');
    Route::get('/account-address', [AppController::class, 'account_address'])->name('account_address');
    Route::get('/account-address-add', [AppController::class, 'account_address_add'])->name('account_address_add');
    Route::get('/account-details', [AppController::class, 'account_details'])->name('account_details');
    Route::get('/account-wishlist', [AppController::class, 'account_wishlist'])->name('account_wishlist');
    Route::get('/privacy-policy', [AppController::class, 'privacy_policy'])->name('privacy_policy');
    Route::get('/terms-conditions', [AppController::class, 'terms_conditions'])->name('terms_conditions');
});
