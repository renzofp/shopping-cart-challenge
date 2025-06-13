@extends('layouts.app')

@section('content')
<div class="container shopping-cart">
    <h1 class="text-left">Order Summary</h1>

    <div class="grid md:grid-6 gap-4">
        <div class="md:col-span-4">
            @foreach ($items as $item)
                <div class="grid card sm:grid-2 gap-4">
                    <div class="sm:col-span-1">
                        <img src="https://via.assets.so/game.jpg?w=180&h=180" alt="{{ $item->product_name }}">
                    </div>
                    <div class="sm:col-span-1">
                        <p class="bold">
                            {{ $item->product_name }}
                        </p>
                        <div class="quantity-form">
                            <form action="{{ route('cart.update', $item) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                <button type="submit" name="decrease">-</button>
                            </form>

                            <div class="quantity-display">{{ $item->quantity }}</div>

                            <form action="{{ route('cart.update', $item) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                <button type="submit" name="increase">+</button>
                            </form>
                            
                            <div class="item-total bold">
                                ${{ number_format($item->line_total, 2) }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        @if ($items->count())
            <div class="checkout-summary md:col-span-2">
                <p class="summary-line">
                    Items ({{ $items->count() }}):
                    <span class="summary-price">
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
                    <span class="summary-price">
                        ${{ number_format($gst,2) }}
                    </span>
                </p>
                <p class="summary-line">
                    QST: 
                    <span class="summary-price">
                        ${{ number_format($qst,2) }}
                    </span>
                </p>
                <p class="summary-line">
                    Order Total: 
                    <span class="summary-price">
                        ${{ number_format($total,2) }}
                    </span>
                </p>
                <form method="POST" action="{{ route('cart.checkout') }}">
                    @csrf
                    <button type="submit" class="w-full checkout-button">
                        Proceed to Checkout
                    </button>
                </form>
            </div>
        @endif
    </div>    

    @if (session('status'))
        <p class="cart-status">{{ session('status') }}</p>
    @endif
</div>
@endsection
