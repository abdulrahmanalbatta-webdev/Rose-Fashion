@extends('admin.layout')
@section('title')
    Add Brand
@endsection
@section('content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ __('Brand information') }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="#">
                        <div class="text-tiny">{{ __('Dashboard') }}</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="#">
                        <div class="text-tiny">{{ __('Brands') }}</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{ __('New Brand') }}</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.brands.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <x-form.input label="{{ __('English name') }}" required type="text"
                            placeholder="{{ __('Brand name in English') }}" name="name_en" />
                    </div>
                    <div class="col-md-6">
                        <x-form.input label="{{ __('Arabic name') }}" required type="text"
                            placeholder="{{ __('Brand name in Arabic') }}" name="name_ar" />
                    </div>
                </div>
                <x-form.file label="{{ __('Upload images') }}" required name="image" />

                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
