    @extends('admin.layout')
    @section('title')
        Add Product
    @endsection

    @section('css')
        <style>
            .lang-tabs {
                background: #f3f4f6;
                border-radius: 12px;
                padding: 6px;
                display: inline-flex;
            }

            .lang-tab-btn {
                padding: 10px 22px;
                border: none;
                background: transparent;
                border-radius: 9px;
                font-weight: 600;
                font-size: 14px;
                color: #6b7280;
                cursor: pointer;
                transition: all .25s ease;
            }

            .lang-tab-btn:hover {
                color: #111827;
            }

            .lang-tab-btn.active {
                background: #fff;
                color: #2a85ff;
                box-shadow: 0 2px 8px rgba(0, 0, 0, .08);
            }

            .lang-content.hidden {
                display: none;
            }

            .lang-content {
                animation: langFadeIn .25s ease;
            }

            @keyframes langFadeIn {
                from {
                    opacity: 0;
                    transform: translateY(4px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
    @endsection

    @section('content')
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>{{ __('Add Product') }}</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="index-2.html">
                            <div class="text-tiny">{{ __('Dashboard') }}</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="all-product.html">
                            <div class="text-tiny">{{ __('Products') }}</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">{{ __('Add product') }}</div>
                    </li>
                </ul>
            </div>
            <form class="tf-section-2 form-add-product" action="{{ route('admin.products.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="wg-box">

                    <div class="lang-tabs flex gap10 mb-20">
                        <button type="button" class="lang-tab-btn active" data-lang="en">{{ __('English') }}</button>
                        <button type="button" class="lang-tab-btn" data-lang="ar">{{ __('Arabic') }}</button>
                    </div>

                    <!-- English Fields -->
                    <div class="lang-content" data-lang-content="en">
                        <x-form.input label="{{ __('English name') }}" className="mb-10" required type="text"
                            placeholder="{{ __('Enter the product name English.') }}" name="name_en"
                            value="{{ old('name_en') }}" />
                        <x-form.textarea className="shortdescription mb-20" label="{{ __('English Short Description') }}"
                            required name="short_description_en"
                            placeholder="{{ __('Enter the english short description') }}"
                            value="{{ old('short_description_en') }}" />
                        <x-form.textarea className="description" label="{{ __('Description English') }}" required
                            name="description_en" placeholder="{{ __('Enter the description English') }}"
                            value="{{ old('description_en') }}" />
                    </div>

                    <!-- Arabic Fields -->
                    <div class="lang-content hidden" data-lang-content="ar">
                        <x-form.input label="{{ __('Arabic name') }}" required type="text"
                            placeholder="{{ __('Enter the product name Arabic') }}" name="name_ar"
                            value="{{ old('name_ar') }}" />
                        <x-form.textarea className="shortdescription mb-10" label="{{ __('Arabic Short Description') }}"
                            required name="short_description_ar"
                            placeholder="{{ __('Enter the arabic short description') }}"
                            value="{{ old('short_description_ar') }}" />
                        <x-form.textarea className="description" label="{{ __('Description Arabic') }}" required
                            name="description_ar" placeholder="{{ __('Enter the description Arabic') }}"
                            value="{{ old('description_ar') }}" />
                    </div>

                    <div class="gap22 cols mt-20">
                        <x-form.select className="category" label="{{ __('Category') }}" required name="category_id"
                            :options="$categories" oldValue="{{ old('category_id') }}" />
                        <x-form.select className="brand" label="{{ __('Brand') }}" required name="brand_id"
                            :options="$brands" oldValue="{{ old('brand_id') }}" />
                    </div>
                </div>
                <div class="wg-box">
                    <x-form.file label="{{ __('Upload image') }}" required name="image" />
                    <x-form.file label="{{ __('Upload Gallery Images') }}" name="gallery[]" :multiple="true" />
                    <div class="cols gap22">
                        <x-form.input className="name" label="{{ __('Cost Price') }}" required type="text"
                            placeholder="{{ __('Enter cost price') }}" name="cost_price"
                            value="{{ old('cost_price') }}" />
                        <x-form.input className="name" label="{{ __('Regular Price') }}" required type="text"
                            placeholder="{{ __('Enter regular price') }}" name="regular_price"
                            value="{{ old('regular_price') }}" />
                        <x-form.input className="name" label="{{ __('Sale Price') }}" required type="text"
                            placeholder="{{ __('Enter sale price') }}" name="sale_price"
                            value="{{ old('sale_price') }}" />
                    </div>
                    <div class="cols gap22">
                        <x-form.input className="name" label="{{ __('SKU') }}" required type="text"
                            placeholder="{{ __('Enter SKU') }}" name="sku" value="{{ old('sku') }}" />
                        <x-form.input className="name" label="{{ __('Quantity') }}" required type="text"
                            placeholder="{{ __('Enter quantity') }}" name="quantity" value="{{ old('quantity') }}" />
                    </div>
                    <div class="cols gap22">
                        <x-form.select className="name" label="{{ __('Stock') }}" required name="in_stock"
                            :options="$stocks" oldValue="{{ old('in_stock') }}" />
                        <x-form.select className="name" label="{{ __('Featured') }}" required name="featured"
                            :options="$featuredOptions" oldValue="{{ old('featured') }}" />
                    </div>
                    <div class="cols gap10">
                        <button class="tf-button w-full" type="submit">{{ __('Add product') }}</button>
                    </div>
                </div>
            </form>

        </div>
    @endsection

    @section('js')
        <script>
            document.querySelectorAll('.lang-tab-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.lang-tab-btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    const lang = btn.dataset.lang;
                    document.querySelectorAll('.lang-content').forEach(c => {
                        c.classList.toggle('hidden', c.dataset.langContent !== lang);
                    });
                });
            });
        </script>
    @endsection
