@extends('website.layout')
@section('title')
    Verify Email
@endsection
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <ul class="nav nav-tabs mb-5" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore active">Verify Email</a>
                </li>
            </ul>

            <div class="tab-content pt-2">
                <div class="tab-pane fade show active">
                    <div class="register-form text-center">

                        {{-- Icon --}}
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" class="text-primary mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <h4 class="mb-3">Check your email</h4>

                        <p class="text-secondary mb-4">
                            Thanks for signing up! Before getting started, please verify your email address by clicking on
                            the link we just sent you.
                        </p>

                        {{-- Success Message --}}
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success mb-4">
                                A new verification link has been sent to your email address.
                            </div>
                        @endif

                        {{-- Resend Button --}}
                        <form method="POST" action="{{ route('verification.send') }}" class="mb-3">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100 text-uppercase">
                                Resend Verification Email
                            </button>
                        </form>

                        {{-- Logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary w-100 text-uppercase">
                                Log Out
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
