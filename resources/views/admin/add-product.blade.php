@extends('admin.layout')
@section('title')
    Add Product
@endsection
@section('content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index-2.html">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="all-product.html">
                        <div class="text-tiny">Products</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Add product</div>
                </li>
            </ul>
        </div>
        <form class="tf-section-2 form-add-product" action="{{ route('admin.products.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="wg-box">
                <x-form.input label="Product name" required class="mb-10" tiny type="text"
                    placeholder="Enter product name" name="name" value="{{ old('name') }}" />

                <div class="gap22 cols">
                    <x-form.select className="category" label="Category" required name="category_id" :options="$categories" />
                    <x-form.select className="brand" label="Brand" required name="brand_id" :options="$brands" />
                </div>
                <x-form.textarea className="shortdescription" label="Short Description" required name="short_description"
                    placeholder="Short Description" value="{{ old('short_description') }}" />
                <x-form.textarea className="description" label="Description" required name="description"
                    placeholder="Description" value="{{ old('description') }}" />
            </div>
            <div class="wg-box">
                <x-form.file label="Upload image" required name="image" />
                <x-form.file label="Upload Gallery Images" name="gallery[]" :multiple="true" />
                <div class="cols gap22">
                    <x-form.input className="name" label="Regular Price" required type="text"
                        placeholder="Enter regular price" name="regular_price" value="{{ old('regular_price') }}" />
                    <x-form.input className="name" label="Sale Price" required type="text" placeholder="Enter sale price"
                        name="sale_price" value="{{ old('sale_price') }}" />
                </div>
                <div class="cols gap22">
                    <x-form.input className="name" label="SKU" required type="text" placeholder="Enter SKU"
                        name="SKU" value="{{ old('SKU') }}" />
                    <x-form.input className="name" label="Quantity" required type="text" placeholder="Enter quantity"
                        name="quantity" value="{{ old('quantity') }}" />
                </div>
                <div class="cols gap22">
                    <x-form.select className="name" label="Stock" required name="stock" :options="$stocks" />
                    <x-form.select className="name" label="Featured" required name="featured" :options="$featured" />
                </div>
                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Add product</button>
                </div>
            </div>
        </form>

    </div>
@endsection
