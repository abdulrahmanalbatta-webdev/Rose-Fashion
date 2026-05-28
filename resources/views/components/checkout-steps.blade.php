<div class="checkout-steps">
    <a href="{{ route('fashion.cart') }}"
        class="checkout-steps__item
    {{ request()->routeIs('fashion.cart') ? 'active' : '' }}">
        <span class="checkout-steps__item-number">01</span>
        <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
        </span>
    </a>
    <a href="{{ route('fashion.checkout') }}"
        class="checkout-steps__item
    {{ request()->routeIs('fashion.checkout') ? 'active' : '' }}">
        <span class="checkout-steps__item-number">02</span>
        <span class="checkout-steps__item-title">
            <span>Shipping and Checkout</span>
            <em>Checkout Your Items List</em>
        </span>
    </a>
    <a href="{{ route('fashion.order_confirmation') }}"
        class="checkout-steps__item
    {{ request()->routeIs('fashion.order_confirmation') ? 'active' : '' }}">
        <span class="checkout-steps__item-number">03</span>
        <span class="checkout-steps__item-title">
            <span>Confirmation</span>
            <em>Review And Submit Your Order</em>
        </span>
    </a>
</div>
