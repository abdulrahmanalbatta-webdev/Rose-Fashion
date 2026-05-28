<ul class="account-nav">
    <li><a href="{{ route('fashion.my_account') }}"
            class="menu-link menu-link_us-s
        {{ request()->routeIs('fashion.my_account') ? 'menu-link_active' : '' }}">Dashboard</a>
    </li>
    <li><a href="{{ route('fashion.account_orders') }}"
            class="menu-link menu-link_us-s
        {{ request()->routeIs('fashion.account_orders') ? 'menu-link_active' : '' }}">Orders</a>
    </li>
    <li><a href="{{ route('fashion.account_address') }}"
            class="menu-link menu-link_us-s
        {{ request()->routeIs('fashion.account_address') ? 'menu-link_active' : '' }}">Addresses</a>
    </li>
    <li><a href="{{ route('fashion.account_details') }}"
            class="menu-link menu-link_us-s
        {{ request()->routeIs('fashion.account_details') ? 'menu-link_active' : '' }}">Account
            Details</a></li>
    <li><a href="{{ route('fashion.account_wishlist') }}"
            class="menu-link menu-link_us-s
        {{ request()->routeIs('fashion.account_wishlist') ? 'menu-link_active' : '' }}">Wishlist</a>
    </li>
    <li><a href="{{ route('fashion.login') }}" class="menu-link menu-link_us-s">Logout</a></li>
</ul>
