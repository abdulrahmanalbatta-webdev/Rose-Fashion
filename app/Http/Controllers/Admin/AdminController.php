<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function sliders()
    {
        return view('admin.slider');
    }

    public function add_slider()
    {
        return view('admin.add-slide');
    }

    public function coupons()
    {
        return view('admin.coupons');
    }

    public function add_coupon()
    {
        return view('admin.add-coupon');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
