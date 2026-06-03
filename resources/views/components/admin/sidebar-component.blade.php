<div class="section-menu-left">
    <div class="box-logo">
        <a href="{{ route('fashion.index') }}" id="site-logo-inner">
            <img src="{{ asset('admin/images/logo/logo.png') }}" style="width: 139px; height: 33px;" class=""
                id="logo_header" alt="" {{-- data-light="{{ asset('admin/images/logo/logo.png') }}"
                data-dark="{{ asset('admin/images/logo/logo.png') }}"> --}}> </a>
        <div class="button-show-hide">
            <i class="icon-menu-left"></i>
        </div>
    </div>
    <div class="center">
        <div class="center-item">
            <div class="center-heading">Main Home</div>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="{{ route('admin.index') }}"
                        class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
                        <div class="icon"><i class="icon-grid"></i></div>
                        <div class="text">Dashboard</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="center-item">
            <ul class="menu-list">
                <li class="menu-item has-children {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <a href="javascript:void(0);"
                        class="menu-item-button
                    {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <div class="icon"><i class="icon-layers"></i></div>
                        <div class="text">Category</div>
                    </a>
                    <ul class="sub-menu"
                        style="display: {{ request()->routeIs('admin.categories.*') ? 'block' : 'none' }}">
                        <li class="sub-menu-item">
                            <a href="{{ route('admin.categories.create') }}"
                                class="{{ request()->routeIs('admin.categories.create') ? 'active' : '' }}">
                                <div class="text">New Category</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('admin.categories.index') }}"
                                class="{{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                                <div class="text">Categories</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item has-children {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <a href="javascript:void(0);"
                        class="menu-item-button {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <div class="icon"><i class="icon-shopping-cart"></i></div>
                        <div class="text">Products</div>
                    </a>
                    <ul class="sub-menu"
                        style="display: {{ request()->routeIs('admin.products.*') ? 'block' : 'none' }}">
                        <li class="sub-menu-item">
                            <a href="{{ route('admin.products.create') }}"
                                class="{{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
                                <div class="text">Add Product</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('admin.products.index') }}"
                                class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                                <div class="text">Products</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item has-children {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                    <a href="javascript:void(0);"
                        class="menu-item-button {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                        <div class="icon"><i class="icon-layers"></i></div>
                        <div class="text">Brand</div>
                    </a>
                    <ul class="sub-menu"
                        style="display: {{ request()->routeIs('admin.brands.*') ? 'block' : 'none' }}">
                        <li class="sub-menu-item">
                            <a href="{{ route('admin.brands.create') }}"
                                class="{{ request()->routeIs('admin.brands.create') ? 'active' : '' }}">
                                <div class="text">New Brand</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('admin.brands.index') }}"
                                class="{{ request()->routeIs('admin.brands.index') ? 'active' : '' }}">
                                <div class="text">Brands</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item has-children {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                    <a href="javascript:void(0);"
                        class="menu-item-button {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <div class="icon"><i class="icon-file-plus"></i></div>
                        <div class="text">Order</div>
                    </a>
                    <ul class="sub-menu"
                        style="display: {{ request()->routeIs('admin.orders.*') ? 'block' : 'none' }}">
                        <li class="sub-menu-item">
                            <a href="{{ route('admin.orders.index') }}" class="">
                                <div class="text">Orders</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('admin.orders.create') }}" class="">
                                <div class="text">Order tracking</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.sliders') }}"
                        class="{{ request()->routeIs('admin.sliders') ? 'active' : '' }}">
                        <div class="icon"><i class="icon-image"></i></div>
                        <div class="text">Slider</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.coupons') }}"
                        class="{{ request()->routeIs('admin.coupons') ? 'active' : '' }}">
                        <div class="icon"><i class="icon-grid"></i></div>
                        <div class="text">Coupns</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.users') }}"
                        class="{{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="text">User</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.settings') }}"
                        class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <div class="icon"><i class="icon-settings"></i></div>
                        <div class="text">Settings</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
