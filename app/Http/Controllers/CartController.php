<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index', $this->calculateTotals());
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        // session security
        abort_unless($cartItem->session_id === session()->getId(), 403);

        $cartItem->update(['quantity' => $request->quantity]);
        $cartItem->refresh();

        $totals = $this->calculateTotals();

        return response()->json([
            'success' => true,
            'quantity' => $cartItem->quantity,
            'line_total' => number_format($cartItem->line_total, 2),
            'subtotal' => number_format($totals['subtotal'], 2),
            'gst' => number_format($totals['gst'], 2),
            'qst' => number_format($totals['qst'], 2),
            'total' => number_format($totals['total'], 2),
        ]);
    }

    private function calculateTotals()
    {
        $items = CartItem::forCurrentSession()->get();
        $subtotal = $items->sum('line_total');
        $gst = round($subtotal * 0.05, 2);
        $qst = round($subtotal * 0.09975, 2);
        $total = $subtotal + $gst + $qst;

        return compact('items', 'subtotal', 'gst', 'qst', 'total');
    }

    public function destroy(CartItem $cartItem)
    {
        abort_unless($cartItem->session_id === session()->getId(), 403);
        $cartItem->delete();

        $totals = $this->calculateTotals();

        return response()->json([
            'success' => true,
            'id' => $cartItem->id,
            'subtotal' => number_format($totals['subtotal'], 2),
            'gst' => number_format($totals['gst'], 2),
            'qst' => number_format($totals['qst'], 2),
            'total' => number_format($totals['total'], 2),
        ]);
    }
}
