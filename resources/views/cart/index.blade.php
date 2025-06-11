@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shopping Cart</h1>

    <div class="cart-grid cart-header">
        <div>Item</div>
        <div>Price</div>
        <div>Qty</div>
        <div>Item Total</div>
    </div>

    @foreach ($items as $item)
        <div class="cart-grid cart-item">
            <div>
                <span class="label-mobile">Item:</span>
                {{ $item->product_name }}
            </div>
            <div>
                <span class="label-mobile"><span class="unit-price-mobile">Unit</span> Price:</span>
                <span class="price-desktop">${{ number_format($item->price, 2) }}</span>
            </div>
            <div>
                <span class="label-mobile">Qty:</span>
                <form action="{{ route('cart.update', $item) }}" method="POST" class="quantity-form">
                    @csrf
                    <input name="quantity" type="number" min="1" value="{{ $item->quantity }}">
                    <button>Update</button>
                </form>
            </div>
            <div>
                <span class="label-mobile">Item Total:</span>
                <span class="price-desktop">${{ number_format($item->line_total, 2) }}</span>
            </div>
        </div>
    @endforeach

    <div class="cart-summary">
        <div class="summary-row">
            <div>Subtotal</div>
            <div>${{ number_format($subtotal, 2) }}</div>
        </div>
        <div class="summary-row">
            <div>GST (5%)</div>
            <div>${{ number_format($gst, 2) }}</div>
        </div>
        <div class="summary-row">
            <div>QST (9.975%)</div>
            <div>${{ number_format($qst, 2) }}</div>
        </div>
        <div class="summary-row grand-total">
            <div>Grand Total</div>
            <div>${{ number_format($total, 2) }}</div>
        </div>
    </div>

    @if ($items->count())
        <div class="checkout-container">
            <form method="POST" action="{{ route('cart.checkout') }}">
                @csrf
                <button type="submit" class="checkout-button">
                    Guest Checkout
                </button>
            </form>
        </div>
    @endif

    @if (session('status'))
        <p class="cart-status alert-success">{{ session('status') }}</p>
    @endif

</div>
@endsection
