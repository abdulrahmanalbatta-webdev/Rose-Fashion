<div class="header-dashboard">
    <div class="wrap">
        @if (app()->getLocale() == 'ar')
            <div class="header-grid">
                <div class="popup-wrap language type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="header-item">
                                <i class="icon-globe"></i>
                                {{-- <span class="text-tiny ms-1 d-none d-sm-inline">
                                {{ strtoupper(LaravelLocalization::getCurrentLocale()) }}
                            </span> --}}
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" style="min-width: 150px;">
                            <li>
                                <h6>{{ __('Language') }}</h6>
                            </li>
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        class="user-item {{ LaravelLocalization::getCurrentLocale() === $localeCode ? 'active' : '' }}">
                                        <div class="icon">
                                            @if ($localeCode === 'ar')
                                                <img src="{{ asset('admin/images/flags/ar.png') }}" alt="Arabic"
                                                    width="20">
                                            @else
                                                <img src="{{ asset('admin/images/flags/en.png') }}" alt="English"
                                                    width="20">
                                            @endif
                                        </div>
                                        <div
                                            class="body-title-2 {{ LaravelLocalization::getCurrentLocale() === 'en' && $localeCode === 'ar' ? 'lang-arabic' : 'aaa' }}">
                                            {{ $properties['native'] }}
                                        </div>
                                        @if (LaravelLocalization::getCurrentLocale() === $localeCode)
                                            <div class="ms-auto">
                                                <i class="icon-check"
                                                    style="color: var(--primary); font-size: 12px;"></i>
                                            </div>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="popup-wrap message type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <span class="text-tiny">1</span>
                                <i class="icon-bell"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2">
                            <li>
                                <h6>{{ __('Notifications') }}</h6>
                            </li>
                            <li>
                                <div class="message-item item-1">
                                    <div class="image">
                                        <i class="icon-noti-1"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Discount available</div>
                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus
                                            at, ullamcorper nec diam</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-2">
                                    <div class="image">
                                        <i class="icon-noti-2"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Account has been verified</div>
                                        <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus
                                            et</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-3">
                                    <div class="image">
                                        <i class="icon-noti-3"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Order shipped successfully</div>
                                        <div class="text-tiny">Integer aliquam eros nec sollicitudin
                                            sollicitudin</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-4">
                                    <div class="image">
                                        <i class="icon-noti-4"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Order pending: <span>ID 305830</span>
                                        </div>
                                        <div class="text-tiny">Ultricies at rhoncus at ullamcorper
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{ asset('admin/#') }}" class="tf-button w-full">View
                                    all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="popup-wrap user type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-user wg-user">
                                <span class="image">
                                    @if (Auth::user()->image)
                                        <img src="{{ asset('storage/' . Auth::user()->image->path) }}" width="48"
                                            height="48">
                                    @else
                                        <img src="/avatar?name={{ urlencode(Auth::user()->trans_name) }}"
                                            width="48" height="48">
                                    @endif
                                </span>
                                <span class="flex flex-column">
                                    <span
                                        class="body-title mb-2">{{ explode(' ', Auth()->user()->trans_name)[0] }}</span>
                                    <span class="text-tiny">{{ Auth()->user()->type }}</span>
                                </span>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
                            <li>
                                <a href="{{ route('admin.profile.edit') }}" class="user-item">
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="body-title-2">{{ __('Account') }}</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.inbox') }}" class="user-item">
                                    <div class="icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="body-title-2">{{ __('Inbox') }}</div>
                                    <div class="number">27</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/#') }}" class="user-item">
                                    <div class="icon">
                                        <i class="icon-file-text"></i>
                                    </div>
                                    <div class="body-title-2">{{ __('Taskboard') }}</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/#') }}" class="user-item">
                                    <div class="icon">
                                        <i class="icon-headphones"></i>
                                    </div>
                                    <div class="body-title-2">{{ __('Support') }}</div>
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="user-item" style="border: none; padding-right: 0;">
                                        <div class="icon">
                                            <i class="icon-log-out"></i>
                                        </div>
                                        <div class="body-title-2">{{ __('Log out') }}</div>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-left">
                <a href="{{ asset('admin/index-2.html') }}">
                    <img class="" id="logo_header_mobile" alt=""
                        src="{{ asset('admin/images/logo/logo.png') }}"
                        data-light="{{ asset('admin/images/logo/logo.png') }}"
                        data-dark="{{ asset('admin/images/logo/logo.png') }}" data-width="154px" data-height="52px"
                        data-retina="{{ asset('admin/images/logo/logo.png') }}">
                </a>
                <div class="button-show-hide">
                    <i class="icon-menu-left"></i>
                </div>


                <form class="form-search flex-grow">
                    <fieldset class="name">
                        <input type="text" placeholder="{{ __('Search here...') }}" class="show-search"
                            name="name" tabindex="2" value="" aria-required="true" required="">
                    </fieldset>
                    <div class="button-submit">
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </div>
                    <div class="box-content-search" id="box-content-search">
                        <ul class="mb-24">
                            <li class="mb-14">
                                <div class="body-title">Top selling product</div>
                            </li>
                            <li class="mb-14">
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/17.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Dog
                                                    Food
                                                    Rachael Ray Nutrish®</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/18.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Natural
                                                    Dog Food Healthy Dog Food</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/19.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Freshpet
                                                    Healthy Dog Food and Cat</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="">
                            <li class="mb-14">
                                <div class="body-title">Order product</div>
                            </li>
                            <li class="mb-14">
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/20.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Sojos
                                                    Crunchy Natural Grain Free...</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/21.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Kristin
                                                    Watson</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/22.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Mega
                                                    Pumpkin Bone</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/23.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Mega
                                                    Pumpkin Bone</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>

            </div>
        @else
            <div class="header-left">
                <a href="{{ asset('admin/index-2.html') }}">
                    <img class="" id="logo_header_mobile" alt=""
                        src="{{ asset('admin/images/logo/logo.png') }}"
                        data-light="{{ asset('admin/images/logo/logo.png') }}"
                        data-dark="{{ asset('admin/images/logo/logo.png') }}" data-width="154px" data-height="52px"
                        data-retina="{{ asset('admin/images/logo/logo.png') }}">
                </a>
                <div class="button-show-hide">
                    <i class="icon-menu-left"></i>
                </div>


                <form class="form-search flex-grow">
                    <fieldset class="name">
                        <input type="text" placeholder="{{ __('Search here...') }}" class="show-search"
                            name="name" tabindex="2" value="" aria-required="true" required="">
                    </fieldset>
                    <div class="button-submit">
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </div>
                    <div class="box-content-search" id="box-content-search">
                        <ul class="mb-24">
                            <li class="mb-14">
                                <div class="body-title">Top selling product</div>
                            </li>
                            <li class="mb-14">
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/17.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Dog
                                                    Food
                                                    Rachael Ray Nutrish®</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/18.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Natural
                                                    Dog Food Healthy Dog Food</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/19.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Freshpet
                                                    Healthy Dog Food and Cat</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="">
                            <li class="mb-14">
                                <div class="body-title">Order product</div>
                            </li>
                            <li class="mb-14">
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/20.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Sojos
                                                    Crunchy Natural Grain Free...</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/21.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Kristin
                                                    Watson</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/22.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Mega
                                                    Pumpkin Bone</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14">
                                        <div class="image no-bg">
                                            <img src="{{ asset('admin/images/products/23.png') }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="{{ asset('admin/product-list.html') }}"
                                                    class="body-text">Mega
                                                    Pumpkin Bone</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>

            </div>
            <div class="header-grid">
                <div class="popup-wrap language type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="header-item">
                                <i class="icon-globe"></i>
                                {{-- <span class="text-tiny ms-1 d-none d-sm-inline">
                                {{ strtoupper(LaravelLocalization::getCurrentLocale()) }}
                            </span> --}}
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" style="min-width: 150px;">
                            <li>
                                <h6>{{ __('Language') }}</h6>
                            </li>
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        class="user-item {{ LaravelLocalization::getCurrentLocale() === $localeCode ? 'active' : '' }}">
                                        <div class="icon">
                                            @if ($localeCode === 'ar')
                                                <img src="{{ asset('admin/images/flags/ar.png') }}" alt="Arabic"
                                                    width="20">
                                            @else
                                                <img src="{{ asset('admin/images/flags/en.png') }}" alt="English"
                                                    width="20">
                                            @endif
                                        </div>
                                        <div
                                            class="body-title-2 {{ LaravelLocalization::getCurrentLocale() === 'en' && $localeCode === 'ar' ? 'lang-arabic' : 'aaa' }}">
                                            {{ $properties['native'] }}
                                        </div>
                                        @if (LaravelLocalization::getCurrentLocale() === $localeCode)
                                            <div class="ms-auto">
                                                <i class="icon-check"
                                                    style="color: var(--primary); font-size: 12px;"></i>
                                            </div>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="popup-wrap message type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <span class="text-tiny">1</span>
                                <i class="icon-bell"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2">
                            <li>
                                <h6>{{ __('Notifications') }}</h6>
                            </li>
                            <li>
                                <div class="message-item item-1">
                                    <div class="image">
                                        <i class="icon-noti-1"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Discount available</div>
                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus
                                            at, ullamcorper nec diam</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-2">
                                    <div class="image">
                                        <i class="icon-noti-2"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Account has been verified</div>
                                        <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus
                                            et</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-3">
                                    <div class="image">
                                        <i class="icon-noti-3"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Order shipped successfully</div>
                                        <div class="text-tiny">Integer aliquam eros nec sollicitudin
                                            sollicitudin</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-4">
                                    <div class="image">
                                        <i class="icon-noti-4"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Order pending: <span>ID 305830</span>
                                        </div>
                                        <div class="text-tiny">Ultricies at rhoncus at ullamcorper
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{ asset('admin/#') }}" class="tf-button w-full">View
                                    all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="popup-wrap user type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-user wg-user">
                                <span class="image">
                                    @if (Auth::user()->image)
                                        <img src="{{ asset('storage/' . Auth::user()->image->path) }}" width="48"
                                            height="48">
                                    @else
                                        <img src="/avatar?name={{ urlencode(Auth::user()->trans_name) }}"
                                            width="48" height="48">
                                    @endif
                                </span>
                                <span class="flex
                                        flex-column">
                                    <span
                                        class="body-title mb-2">{{ explode(' ', Auth()->user()->trans_name)[0] }}</span>
                                    <span class="text-tiny">{{ Auth()->user()->type }}</span>
                                </span>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
                            <li>
                                <a href="{{ route('admin.profile.edit') }}" class="user-item">
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="body-title-2">{{ __('Account') }}</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.inbox') }}" class="user-item">
                                    <div class="icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="body-title-2">{{ __('Inbox') }}</div>
                                    <div class="number">27</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/#') }}" class="user-item">
                                    <div class="icon">
                                        <i class="icon-file-text"></i>
                                    </div>
                                    <div class="body-title-2">{{ __('Taskboard') }}</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('admin/#') }}" class="user-item">
                                    <div class="icon">
                                        <i class="icon-headphones"></i>
                                    </div>
                                    <div class="body-title-2">{{ __('Support') }}</div>
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="user-item" style="border: none; padding: 0;">
                                        <div class="icon">
                                            <i class="icon-log-out"></i>
                                        </div>
                                        <div class="body-title-2">{{ __('Log out') }}</div>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
