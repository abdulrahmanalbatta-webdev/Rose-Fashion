<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function contact_data(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        // Anonymous Mail
        // abdulrahmanalbatta.dev@gmail.com
        // Mail::send('vendor.mail.test', [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'comment' => $request->comment
        // ], function ($message) use ($request) {

        //     $message->to("abdulrahmanalbatta.dev@gmail.com")
        //         ->subject("New Contact Message")
        //         ->replyTo($request->email);
        // });

        Mail::to('abdulrahmanalbatta.dev@gmail.com')->send(new ContactMail($request->name, $request->email, $request->phone, $request->comment));

        dd("Mail Sent Successfully");
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
