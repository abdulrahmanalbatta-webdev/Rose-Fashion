@extends('website.layout')
@section('title')
    Register
@endsection
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
                        href="#tab-item-register" role="tab" aria-controls="tab-item-register"
                        aria-selected="true">Register</a>
                </li>
            </ul>
            <div class="tab-content pt-2" id="login_register_tab_content">
                <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel"
                    aria-labelledby="register-tab">
                    <div class="register-form">
                        <div class="social-login mb-4">
                            <a href="{{ route('auth.redirect', 'google') }}"
                                class="btn btn-outline-secondary w-100 mb-2 d-flex align-items-center justify-content-center gap-2">
                                <svg width="20" height="20" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/  svg">
                                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                                                    c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4
                                                    C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20
                                                    C44,22.659,43.862,21.35,43.611,20.083z" />
                                    <path fill="#FF3D00"
                                        d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039
                                                    l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                                    <path fill="#4CAF50"
                                        d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                                                    c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                                                    c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24
                                                    C44,22.659,43.862,21.35,43.611,20.083z" />
                                </svg> {{ __('Continue with Google') }}
                            </a>
                        </div>

                        <div class="d-flex align-items-center my-4">
                            <hr class="flex-grow-1">
                            <span class="px-3 text-secondary">{{ __('OR') }}</span>
                            <hr class="flex-grow-1">
                        </div>
                        <form method="POST" action="{{ route('register') }}" name="register-form">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control " name="name" value="" autocomplete="name"
                                    autofocus="">
                                <label for="name">Name</label>
                                @error('name')
                                    <div class="form-error-wrapper">
                                        <p class="form-error">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="pb-3"></div>
                            <div class="form-floating mb-3">
                                <input id="email" type="email" class="form-control " name="email" value=""
                                    autocomplete="email">
                                <label for="email">Email address *</label>
                                @error('email')
                                    <div class="form-error-wrapper">
                                        <p class="form-error">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input id="mobile" type="text" class="form-control " name="phone" value=""
                                    autocomplete="mobile">
                                <label for="mobile">Mobile *</label>
                                @error('phone')
                                    <div class="form-error-wrapper">
                                        <p class="form-error">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <div class="pb-3"></div>

                            <div class="form-floating mb-3">
                                <input id="password" type="password" class="form-control " name="password"
                                    autocomplete="new-password">
                                <label for="password">Password *</label>
                                @error('password')
                                    <div class="form-error-wrapper">
                                        <p class="form-error">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                                <label for="password">Confirm Password *</label>
                                @error('password_confirmation')
                                    <div class="form-error-wrapper">
                                        <p class="form-error">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center mb-3 pb-2">
                                <p class="m-0">Your personal data will be used to support your experience throughout this
                                    website, to
                                    manage access to your account, and for other purposes described in our privacy policy.
                                </p>
                            </div>

                            <button class="btn btn-primary w-100 text-uppercase" type="submit">Register</button>

                            <div class="customer-option mt-4 text-center">
                                <span class="text-secondary">Have an account?</span>
                                <a href="{{ route('login') }}" class="btn-text js-show-register">Login to your
                                    Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
