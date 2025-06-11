<?php

namespace Database\Seeders;

use App\Models\CartItem;

class CartSeeder
{

    public static function run(string $sessionId)
    {
        CartItem::insert([
            [
                'session_id'   => $sessionId,
                'product_name' => 'Nintendo Switch 2 Mario Kart World Bundle',
                'price'        => 699.99,
                'quantity'     => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'session_id'   => $sessionId,
                'product_name' => 'Legend of Zelda: Tears of the Kingdom (Switch 2)',
                'price'        => 114.99,
                'quantity'     => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'session_id'   => $sessionId,
                'product_name' => 'Donkey Kong Bananza (Switch 2)',
                'price'        => 99.99,
                'quantity'     => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'session_id'   => $sessionId,
                'product_name' => 'Nintendo Switch 2 Carrying Case & Screen Protector',
                'price'        => 49.99,
                'quantity'     => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'session_id'   => $sessionId,
                'product_name' => 'Surge Tempered Glass Screen Protector for Switch 2',
                'price'        => 14.99,
                'quantity'     => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'session_id'   => $sessionId,
                'product_name' => 'Nintendo Switch 2 Pro Controller',
                'price'        => 109.99,
                'quantity'     => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'session_id'   => $sessionId,
                'product_name' => 'Samsung Super Mario 256GB microSD for Switch 2',
                'price'        => 84.99,
                'quantity'     => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'session_id'   => $sessionId,
                'product_name' => 'Nintendo Switch 2 Steering Wheel for Joy-Con – 2 Pack',
                'price'        => 29.99,
                'quantity'     => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]
        ]);
    }
}
