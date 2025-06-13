<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Database\Seeders\CartSeeder;

Route::get('/', function () {
    return redirect('/cart');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/cart/update/{cartItem}', 'update')->name('cart.update');
    Route::delete('/cart/delete/{cartItem}', 'destroy')->name('cart.destroy');
});

Route::get('/seed-cart', function () {
    $session = session()->getId();
    CartSeeder::run($session);

    return redirect('/cart')->with('status', 'Cart loaded with a full Nintendo Switch 2 kit');
});

Route::post('/cart/checkout', function () {
    return back()->with('status', 'Checkout flow would begin here.');
})->name('cart.checkout');
