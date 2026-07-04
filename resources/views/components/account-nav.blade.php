<ul class="account-nav">
    <li><a href="{{ route('website.my_account') }}"
            class="menu-link menu-link_us-s
        {{ request()->routeIs('website.my_account') ? 'menu-link_active' : '' }}">Dashboard</a>
    </li>
    <li><a href="{{ route('website.account_orders') }}"
            class="menu-link menu-link_us-s
        {{ request()->routeIs('website.account_orders') ? 'menu-link_active' : '' }}">Orders</a>
    </li>
    <li><a href="{{ route('website.account_address') }}"
            class="menu-link menu-link_us-s
        {{ request()->routeIs('website.account_address') ? 'menu-link_active' : '' }}">Addresses</a>
    </li>
    <li><a href="{{ route('website.account_details') }}"
            class="menu-link menu-link_us-s
        {{ request()->routeIs('website.account_details') ? 'menu-link_active' : '' }}">Account
            Details</a></li>
    <li><a href="{{ route('website.account_wishlist') }}"
            class="menu-link menu-link_us-s
        {{ request()->routeIs('website.account_wishlist') ? 'menu-link_active' : '' }}">Wishlist</a>
    </li>
    <li>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="menu-link menu-link_us-s btn"
                style="font-weight: 500; text-transform: uppercase; font-size: 0.875rem;">
                <div class="icon">
                    <i class="icon-log-out"></i>
                </div>
                <div class="body-title-2">Log out</div>
            </button>
        </form>
    </li>
</ul>
