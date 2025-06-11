<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $items = CartItem::forCurrentSession()->get();
        $subtotal = $items->sum('line_total');
        $gst = round($subtotal * 0.05, 2);
        $qst = round($subtotal * 0.09975, 2);
        $total = $subtotal + $gst + $qst; // https://en.wikipedia.org/wiki/Taxation_in_Canada

        return view('cart.index', compact('items', 'subtotal', 'gst', 'qst', 'total'));
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        // session security
        abort_unless($cartItem->session_id === session()->getId(), 403);

        $cartItem->update(['quantity' => $request->quantity]);

        return back()->with('status', 'Quantity updated!');
    }
}
