@extends('admin.layout')
@section('title')
    Add Slider
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

        .link-block.hidden {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ __('Slider') }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html">
                        <div class="text-tiny">{{ __('Dashboard') }}</div>
                    </a>
                </li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <a href="{{ route('admin.sliders.index') }}">
                        <div class="text-tiny">{{ __('Slider') }}</div>
                    </a>
                </li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <div class="text-tiny">{{ __('New Slide') }}</div>
                </li>
            </ul>
        </div>

        @php
            $hasArErrors =
                $errors->has('tag_ar') ||
                $errors->has('title_line1_ar') ||
                $errors->has('title_line2_ar') ||
                $errors->has('button_text_ar');
        @endphp

        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.sliders.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="lang-tabs flex gap10 mb-10" data-default-lang="{{ $hasArErrors ? 'ar' : 'en' }}">
                    <button type="button" class="lang-tab-btn active" data-lang="en">{{ __('English') }}</button>
                    <button type="button" class="lang-tab-btn" data-lang="ar">{{ __('Arabic') }}</button>
                </div>

                <!-- English Fields -->
                <div class="lang-content" data-lang-content="en">
                    <x-form.input label="{{ __('Tag (English)') }}" type="text"
                        placeholder="{{ __('e.g. NEW ARRIVALS') }}" name="tag_en" value="{{ old('tag_en') }}" />

                    <x-form.input label="{{ __('Title Line 1 (English)') }}" required type="text"
                        placeholder="{{ __('e.g. Night Spring') }}" name="title_line1_en"
                        value="{{ old('title_line1_en') }}" />

                    <x-form.input label="{{ __('Title Line 2 (English)') }}" required type="text"
                        placeholder="{{ __('e.g. Dresses') }}" name="title_line2_en"
                        value="{{ old('title_line2_en') }}" />

                    <x-form.input label="{{ __('Button Text (English)') }}" type="text"
                        placeholder="{{ __('e.g. Shop Now') }}" name="button_text_en"
                        value="{{ old('button_text_en', __('Shop Now')) }}" />
                </div>

                <!-- Arabic Fields -->
                <div class="lang-content hidden" data-lang-content="ar">
                    <x-form.input label="{{ __('Tag (Arabic)') }}" type="text"
                        placeholder="{{ __('e.g. New Arrivals') }}" name="tag_ar" value="{{ old('tag_ar') }}" />

                    <x-form.input label="{{ __('Title Line 1 (Arabic)') }}" required type="text"
                        placeholder="{{ __('e.g. Night Spring') }}" name="title_line1_ar"
                        value="{{ old('title_line1_ar') }}" />

                    <x-form.input label="{{ __('Title Line 2 (Arabic)') }}" required type="text"
                        placeholder="{{ __('e.g. Dresses') }}" name="title_line2_ar"
                        value="{{ old('title_line2_ar') }}" />

                    <x-form.input label="{{ __('Button Text (Arabic)') }}" type="text"
                        placeholder="{{ __('e.g. Shop Now') }}" name="button_text_ar"
                        value="{{ old('button_text_ar', __('Shop Now')) }}" />
                </div>

                <x-form.file label="{{ __('Upload image') }}" required name="image" />

                <div class="gap22 cols mb-10">
                    <x-form.select className="name" label="{{ __('Link Type') }}" required name="link_type"
                        :options="$linkTypes" oldValue="{{ old('link_type') }}" />
                    <x-form.input className="name" label="{{ __('Sort Order') }}" type="number" placeholder="0"
                        name="sort_order" value="{{ old('sort_order', 0) }}" />
                </div>

                <div class="link-block" data-link-block="category">
                    <x-form.select className="category" label="{{ __('Select Category') }}" name="link_id"
                        :options="$categories" oldValue="{{ old('link_id') }}" />
                </div>

                <div class="link-block hidden" data-link-block="product">
                    <x-form.select className="category" label="{{ __('Select Product') }}" name="link_id" :options="$products"
                        oldValue="{{ old('link_id') }}" />
                </div>

                <div class="link-block hidden" data-link-block="external">
                    <x-form.input label="{{ __('External URL') }}" type="text" placeholder="https://..."
                        name="external_url" value="{{ old('external_url') }}" />
                </div>

                <x-form.select className="name" label="{{ __('Status') }}" required name="is_active" :options="$isActiveOptions"
                    oldValue="{{ old('is_active', 1) }}" />

                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Language tab switching
        (function() {
            const switcher = document.querySelector('.lang-tabs');
            const buttons = document.querySelectorAll('.lang-tab-btn');
            const panels = document.querySelectorAll('.lang-content');

            function setLang(lang) {
                buttons.forEach(b => b.classList.toggle('active', b.dataset.lang === lang));
                panels.forEach(p => p.classList.toggle('hidden', p.dataset.langContent !== lang));
            }

            buttons.forEach(btn => btn.addEventListener('click', () => setLang(btn.dataset.lang)));
            setLang(switcher ? switcher.dataset.defaultLang : 'en');
        })();

        // Link type conditional fields
        (function() {
            const linkTypeSelect = document.querySelector('select[name="link_type"]');
            const blocks = document.querySelectorAll('.link-block');

            function setLinkBlock(type) {
                blocks.forEach(block => {
                    const isMatch = block.dataset.linkBlock === type;
                    block.classList.toggle('hidden', !isMatch);
                    block.querySelectorAll('select, input').forEach(field => field.disabled = !isMatch);
                });
            }

            if (linkTypeSelect) {
                linkTypeSelect.addEventListener('change', () => setLinkBlock(linkTypeSelect.value));
                setLinkBlock(linkTypeSelect.value || 'category');
            }
        })();
    </script>
@endsection
