<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function index()
    {
        return view('website.index');
    }

    public function shop()
    {
        return view('website.shop');
    }

    public function about()
    {
        return view('website.about');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function cart()
    {
        return view('website.cart');
    }

    public function checkout()
    {
        return view('website.checkout');
    }

    public function order_confirmation()
    {
        return view('website.order-confirmation');
    }

    public function wishlist()
    {
        return view('website.wishlist');
    }

    public function login()
    {
        return view('website.login');
    }

    public function register()
    {
        return view('website.register');
    }

    public function my_account()
    {
        return view('website.my-account');
    }

    public function account_orders()
    {
        return view('website.account-orders');
    }

    public function account_address()
    {
        return view('website.account-address');
    }

    public function account_address_add()
    {
        return view('website.account-address-add');
    }

    public function account_details()
    {
        return view('website.account-details');
    }

    public function account_wishlist()
    {
        return view('website.account-wishlist');
    }

    public function privacy_policy()
    {
        return view('website.privacy-policy');
    }

    public function terms_conditions()
    {
        return view('website.terms-conditions');
    }
}
