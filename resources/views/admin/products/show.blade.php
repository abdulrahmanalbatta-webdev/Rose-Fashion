@extends('admin.layout')
@section('title')
    Product Details
@endsection

@section('css')
    <style>
        /* ===== Language tabs ===== */
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

        /* ===== Detail rows ===== */
        .detail-group {
            padding: 14px 0;
            border-bottom: 1px solid #eef0f2;
        }

        .detail-group:last-child {
            border-bottom: none;
        }

        .detail-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
            color: #8b8b8b;
            margin-bottom: 6px;
        }

        .detail-value {
            font-size: 15px;
            color: #111827;
            line-height: 1.7;
            word-break: break-word;
        }

        /* ===== Badges ===== */
        .badge-stock {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .badge-stock i {
            font-size: 14px;
        }

        .badge-in {
            background: #e6f8ee;
            color: #1a9c5b;
        }

        .badge-out {
            background: #fdeaea;
            color: #e34646;
        }

        .badge-featured {
            background: #fff4d6;
            color: #b8860b;
        }

        .badge-not-featured {
            background: #f3f4f6;
            color: #6b7280;
        }

        /* ===== Product header card ===== */
        .product-hero {
            display: flex;
            gap: 24px;
            align-items: flex-start;
        }

        .product-hero-thumb {
            flex-shrink: 0;
            width: 96px;
            height: 96px;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #eef0f2;
            background: #f8f9fa;
        }

        .product-hero-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-hero-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }

        .meta-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #6b7280;
            background: #f8f9fa;
            border: 1px solid #eef0f2;
            border-radius: 8px;
            padding: 5px 12px;
        }

        .meta-chip i {
            font-size: 14px;
            color: #2a85ff;
        }

        /* ===== Price cards ===== */
        .price-card {
            border: 1px solid #eef0f2;
            border-radius: 14px;
            padding: 18px 20px;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .price-card.is-sale {
            border-color: #d9ecff;
            background: linear-gradient(135deg, #f3f8ff 0%, #ffffff 100%);
        }

        .price-card .detail-label {
            margin-bottom: 8px;
        }

        .price-card .price-value {
            font-size: 22px;
            font-weight: 700;
            color: #111827;
        }

        .price-card.is-sale .price-value {
            color: #2a85ff;
        }

        .price-card .price-strike {
            font-size: 14px;
            color: #b0b3b8;
            text-decoration: line-through;
            margin-left: 8px;
        }

        /* ===== Main image ===== */
        .main-image-frame {
            border: 1px solid #eef0f2;
            border-radius: 16px;
            overflow: hidden;
            background: #f8f9fa;
            cursor: zoom-in;
            position: relative;
        }

        .main-image-frame img {
            width: 100%;
            max-height: 360px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }

        .main-image-frame .zoom-hint {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(17, 24, 39, .65);
            color: #fff;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
            opacity: 0;
            transition: opacity .2s ease;
        }

        .main-image-frame:hover .zoom-hint {
            opacity: 1;
        }

        /* ===== Gallery grid ===== */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(96px, 1fr));
            gap: 12px;
        }

        .gallery-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #eef0f2;
            cursor: zoom-in;
            aspect-ratio: 1 / 1;
            background: #f8f9fa;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.08);
        }

        .gallery-item .gallery-overlay {
            position: absolute;
            inset: 0;
            background: rgba(17, 24, 39, 0);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            opacity: 0;
            transition: all .25s ease;
        }

        .gallery-item:hover .gallery-overlay {
            background: rgba(17, 24, 39, .35);
            opacity: 1;
        }

        .gallery-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 36px 20px;
            border: 1px dashed #e0e2e6;
            border-radius: 14px;
            color: #9aa0a6;
            font-size: 14px;
        }

        .gallery-empty i {
            font-size: 28px;
            color: #c8ccd1;
        }

        /* ===== Section heading inside box ===== */
        .box-section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
        }

        .box-section-title i {
            font-size: 18px;
            color: #2a85ff;
        }

        .box-section-title h6 {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        /* ===== Lightbox (vanilla JS, no external lib) ===== */
        .pd-lightbox {
            position: fixed;
            inset: 0;
            background: rgba(10, 12, 16, .92);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .pd-lightbox.open {
            display: flex;
            animation: pdFadeIn .2s ease;
        }

        @keyframes pdFadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .pd-lightbox-img-wrap {
            max-width: 90vw;
            max-height: 86vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pd-lightbox img {
            max-width: 90vw;
            max-height: 86vh;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .5);
        }

        .pd-lightbox-close,
        .pd-lightbox-prev,
        .pd-lightbox-next {
            position: absolute;
            background: rgba(255, 255, 255, .1);
            border: 1px solid rgba(255, 255, 255, .2);
            color: #fff;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background .2s ease;
            font-size: 18px;
        }

        .pd-lightbox-close:hover,
        .pd-lightbox-prev:hover,
        .pd-lightbox-next:hover {
            background: rgba(255, 255, 255, .22);
        }

        .pd-lightbox-close {
            top: 20px;
            right: 20px;
        }

        .pd-lightbox-prev {
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .pd-lightbox-next {
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .pd-lightbox-counter {
            position: absolute;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            font-size: 13px;
            background: rgba(255, 255, 255, .12);
            padding: 6px 14px;
            border-radius: 20px;
        }

        @media (max-width: 576px) {
            .pd-lightbox-prev {
                left: 8px;
            }

            .pd-lightbox-next {
                right: 8px;
            }

            .pd-lightbox-close {
                top: 10px;
                right: 10px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ __('Product Details') }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index-2.html">
                        <div class="text-tiny">{{ __('Dashboard') }}</div>
                    </a>
                </li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <a href="{{ route('admin.products.index') }}">
                        <div class="text-tiny">{{ __('Products') }}</div>
                    </a>
                </li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <div class="text-tiny">{{ $product->trans_name }}</div>
                </li>
            </ul>
        </div>

        {{-- ===== Header card: identity + quick actions ===== --}}
        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap mb-20">
                <div class="product-hero">
                    <div class="product-hero-thumb">
                        <img src="{{ $product->imagePath }}" alt="{{ $product->name_en }}">
                    </div>
                    <div>
                        <h5 class="mb-5">{{ $product->trans_name }}</h5>
                        <div class="product-hero-meta">
                            <span class="meta-chip"><i class="icon-tag"></i>{{ $product->sku }}</span>
                            <span class="meta-chip"><i class="icon-grid"></i>{{ $product->category->trans_name }}</span>
                            <span class="meta-chip"><i class="icon-award"></i>{{ $product->brand->trans_name }}</span>
                            @if ($product->in_stock)
                                <span class="badge-stock badge-in"><i
                                        class="icon-check-circle"></i>{{ __('In Stock') }}</span>
                            @else
                                <span class="badge-stock badge-out"><i
                                        class="icon-x-circle"></i>{{ __('Out of Stock') }}</span>
                            @endif
                            @if ($product->featured)
                                <span class="badge-stock badge-featured"><i
                                        class="icon-star"></i>{{ __('Featured') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex gap10">
                    <a class="tf-button style-1 w208" href="{{ route('admin.products.edit', $product) }}">
                        <i class="icon-edit-3"></i>{{ __('Edit') }}
                    </a>
                    <a class="tf-button style-2 w208" href="{{ route('admin.products.index') }}">
                        {{ __('Back to list') }}
                    </a>
                </div>
            </div>

            <div class="divider mb-20"></div>

            <div class="lang-tabs flex gap10 mb-10">
                <button type="button" class="lang-tab-btn active" data-lang="en">{{ __('English') }}</button>
                <button type="button" class="lang-tab-btn" data-lang="ar">{{ __('Arabic') }}</button>
            </div>

            <div class="lang-content" data-lang-content="en">
                <div class="detail-group">
                    <label class="detail-label">{{ __('Name (English)') }}</label>
                    <div class="detail-value">{{ $product->name_en }}</div>
                </div>
                <div class="detail-group">
                    <label class="detail-label">{{ __('Short Description (English)') }}</label>
                    <div class="detail-value">{{ $product->short_description_en }}</div>
                </div>
                <div class="detail-group">
                    <label class="detail-label">{{ __('Description (English)') }}</label>
                    <div class="detail-value">{{ $product->description_en }}</div>
                </div>
            </div>

            <div class="lang-content hidden" data-lang-content="ar" dir="rtl">
                <div class="detail-group">
                    <label class="detail-label">{{ __('Name (Arabic)') }}</label>
                    <div class="detail-value">{{ $product->name_ar }}</div>
                </div>
                <div class="detail-group">
                    <label class="detail-label">{{ __('Short Description (Arabic)') }}</label>
                    <div class="detail-value">{{ $product->short_description_ar }}</div>
                </div>
                <div class="detail-group">
                    <label class="detail-label">{{ __('Description (Arabic)') }}</label>
                    <div class="detail-value">{{ $product->description_ar }}</div>
                </div>
            </div>
        </div>

        {{-- ===== Media card: main image + gallery ===== --}}
        <div class="wg-box">
            <div class="box-section-title">
                <i class="icon-image"></i>
                <h6>{{ __('Product Media') }}</h6>
            </div>

            <div class="row">
                <div class="col-lg-5 mb-20">
                    <label class="detail-label">{{ __('Main Image') }}</label>
                    <div class="main-image-frame" data-lightbox-trigger data-lightbox-index="0">
                        <img src="{{ $product->imagePath }}" alt="{{ $product->name_en }}">
                        <span class="zoom-hint"><i class="icon-zoom-in"></i>{{ __('Click to zoom') }}</span>
                    </div>
                </div>

                <div class="col-lg-7 mb-20">
                    <label class="detail-label">
                        {{ __('Gallery') }}
                        @if (!empty($product->gallery) && count($product->gallery))
                            <span class="text-tiny">({{ count($product->gallery) }})</span>
                        @endif
                    </label>

                    @if (!empty($product->gallery) && count($product->gallery))
                        <div class="gallery-grid">
                            @foreach ($product->gallery as $index => $image)
                                <div class="gallery-item" data-lightbox-trigger data-lightbox-index="{{ $index + 1 }}">
                                    <img src="{{ asset($image->path) }}"
                                        alt="{{ $product->name_en }} {{ $index + 1 }}">
                                    <div class="gallery-overlay"><i class="icon-zoom-in"></i></div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="gallery-empty">
                            <i class="icon-image"></i>
                            <span>{{ __('No gallery images added for this product') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ===== Info card: category, brand, pricing, stock ===== --}}
        <div class="wg-box">
            <div class="box-section-title">
                <i class="icon-info"></i>
                <h6>{{ __('Pricing & Inventory') }}</h6>
            </div>

            <div class="row mb-10">
                <div class="col-md-4 mb-20">
                    <div class="price-card">
                        <label class="detail-label">{{ __('Cost Price') }}</label>
                        <div class="price-value">${{ $product->cost_price }}</div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="price-card">
                        <label class="detail-label">{{ __('Regular Price') }}</label>
                        <div class="price-value">${{ $product->regular_price }}</div>
                    </div>
                </div>
                <div class="col-md-4 mb-20">
                    <div class="price-card {{ $product->sale_price ? 'is-sale' : '' }}">
                        <label class="detail-label">{{ __('Sale Price') }}</label>
                        @if ($product->sale_price)
                            <div class="price-value">
                                ${{ $product->sale_price }}
                                <span class="price-strike">${{ $product->regular_price }}</span>
                            </div>
                        @else
                            <div class="price-value text-tiny" style="font-size:14px; color:#9aa0a6; font-weight:500;">
                                {{ __('No discount') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="divider mb-20"></div>

            <div class="row">
                <div class="col-md-3">
                    <div class="detail-group">
                        <label class="detail-label">{{ __('SKU') }}</label>
                        <div class="detail-value">{{ $product->sku }}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="detail-group">
                        <label class="detail-label">{{ __('Quantity') }}</label>
                        <div class="detail-value">{{ $product->quantity }}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="detail-group">
                        <label class="detail-label">{{ __('Category') }}</label>
                        <div class="detail-value">{{ $product->category->trans_name }}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="detail-group">
                        <label class="detail-label">{{ __('Brand') }}</label>
                        <div class="detail-value">{{ $product->brand->trans_name }}</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="detail-group">
                        <label class="detail-label">{{ __('Stock Status') }}</label>
                        <div class="detail-value">
                            @if ($product->in_stock)
                                <span class="badge-stock badge-in"><i
                                        class="icon-check-circle"></i>{{ __('In Stock') }}</span>
                            @else
                                <span class="badge-stock badge-out"><i
                                        class="icon-x-circle"></i>{{ __('Out of Stock') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-group">
                        <label class="detail-label">{{ __('Featured') }}</label>
                        <div class="detail-value">
                            @if ($product->featured)
                                <span class="badge-stock badge-featured"><i
                                        class="icon-star"></i>{{ __('Featured') }}</span>
                            @else
                                <span class="badge-stock badge-not-featured">{{ __('Not Featured') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Lightbox markup (vanilla, no external library) ===== --}}
    <div class="pd-lightbox" id="pdLightbox">
        <button type="button" class="pd-lightbox-close" id="pdLightboxClose" aria-label="{{ __('Close') }}">
            <i class="icon-x"></i>
        </button>
        <button type="button" class="pd-lightbox-prev" id="pdLightboxPrev" aria-label="{{ __('Previous') }}">
            <i class="icon-chevron-left"></i>
        </button>
        <div class="pd-lightbox-img-wrap">
            <img src="" alt="" id="pdLightboxImg">
        </div>
        <button type="button" class="pd-lightbox-next" id="pdLightboxNext" aria-label="{{ __('Next') }}">
            <i class="icon-chevron-right"></i>
        </button>
        <div class="pd-lightbox-counter" id="pdLightboxCounter"></div>
    </div>
@endsection

@section('js')
    <script>
        // ===== Language tabs =====
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

        // ===== Lightbox (vanilla JS) =====
        (function() {
            const triggers = Array.from(document.querySelectorAll('[data-lightbox-trigger]'));
            if (!triggers.length) return;

            const images = triggers.map(el => el.querySelector('img').getAttribute('src'));

            const lightbox = document.getElementById('pdLightbox');
            const lightboxImg = document.getElementById('pdLightboxImg');
            const counter = document.getElementById('pdLightboxCounter');
            const btnClose = document.getElementById('pdLightboxClose');
            const btnPrev = document.getElementById('pdLightboxPrev');
            const btnNext = document.getElementById('pdLightboxNext');

            let currentIndex = 0;

            function show(index) {
                currentIndex = (index + images.length) % images.length;
                lightboxImg.setAttribute('src', images[currentIndex]);
                counter.textContent = (currentIndex + 1) + ' / ' + images.length;
            }

            function open(index) {
                show(index);
                lightbox.classList.add('open');
                document.body.style.overflow = 'hidden';
            }

            function close() {
                lightbox.classList.remove('open');
                document.body.style.overflow = '';
            }

            triggers.forEach((el, i) => {
                el.addEventListener('click', () => open(i));
            });

            btnClose.addEventListener('click', close);
            btnPrev.addEventListener('click', () => show(currentIndex - 1));
            btnNext.addEventListener('click', () => show(currentIndex + 1));

            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox) close();
            });

            document.addEventListener('keydown', (e) => {
                if (!lightbox.classList.contains('open')) return;
                if (e.key === 'Escape') close();
                if (e.key === 'ArrowLeft') show(currentIndex - 1);
                if (e.key === 'ArrowRight') show(currentIndex + 1);
            });

            // Hide nav arrows / counter if there's only one image
            if (images.length <= 1) {
                btnPrev.style.display = 'none';
                btnNext.style.display = 'none';
                counter.style.display = 'none';
            }
        })();
    </script>
@endsection
