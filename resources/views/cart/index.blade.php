@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <p class="cart-status">{{ session('status') }}</p>
    @endif

    <h1 class="text-left">Order Summary</h1>

    <div class="cart-wrapper grid grid-2 md:grid-6 gap-4">
        <div class="col-span-1 md:col-span-4">
            @foreach ($items as $item)
                <div class="grid card md:grid-2 gap-4" id="item-{{ $item->id }}" data-id="{{ $item->id }}">
                    <div class="col-span-3 md:col-span-1 image-col">
                        <div class="cart-image-wrapper">
                            <img class="cart-image" src="{{ $item->image }}" alt="{{ $item->product_name }}">
                        </div>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <p class="bold">
                            {{ $item->product_name }}
                        </p>
                        <div class="quantity-form" data-id="{{ $item->id }}">
                            <button type="button" class="decrease-btn">-</button>
                            <div class="quantity-display">{{ $item->quantity }}</div>
                            <button type="button" class="increase-btn">+</button>

                            <div class="item-total bold">
                                ${{ number_format($item->line_total, 2) }}
                            </div>
                        </div>
                    </div>
                    <button class="btn delete-btn" data-id="{{ $item->id }}">✕ Remove</button>
                </div>
            @endforeach
        </div>
        
        @if ($items->count())
            <div class="checkout-summary col-span-1 md:col-span-2">
                <p class="summary-line">
                    Items ({{ $items->count() }}):
                    <span class="summary-price" id="subtotal">
                        ${{ number_format($subtotal,2) }}
                    </span>
                </p>
                <p class="summary-line">
                    Shipping: 
                    <span class="summary-price">
                        ${{ number_format(0,2) }}
                    </span>
                </p>
                <p class="summary-line">
                    GST: 
                    <span class="summary-price" id="gst">
                        ${{ number_format($gst,2) }}
                    </span>
                </p>
                <p class="summary-line">
                    QST: 
                    <span class="summary-price" id="qst">
                        ${{ number_format($qst,2) }}
                    </span>
                </p>
                <p class="summary-line">
                    Order Total: 
                    <span class="summary-price" id="total">
                        ${{ number_format($total,2) }}
                    </span>
                </p>
                <form method="POST" action="{{ route('cart.checkout') }}">
                    @csrf
                    <button type="submit" class="w-full btn checkout-btn">
                        Proceed to Checkout
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection
