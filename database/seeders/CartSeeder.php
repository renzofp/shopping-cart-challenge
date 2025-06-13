<?php

namespace Database\Seeders;

use App\Models\CartItem;
use Illuminate\Support\Str;

class CartSeeder
{

    public static function run(string $sessionId)
    {
        $items = [
            'Nintendo Switch 2 Mario Kart World Bundle' => 699.99,
            'Legend of Zelda: Tears of the Kingdom (Switch 2)' => 114.99,
            'Donkey Kong Bananza (Switch 2)' => 99.99,
            'Nintendo Switch 2 Carrying Case & Screen Protector' => 49.99,
            'Surge Tempered Glass Screen Protector for Switch 2' => 14.99,
            'Nintendo Switch 2 Pro Controller' => 109.99,
            'Nintendo Switch 2 Steering Wheel for Joy-Con – 2 Pack' => 29.99,
        ];

        $now = now();
        $data = [];

        foreach ($items as $name => $price) {
            $slug = Str::slug($name);
            $data[] = [
                'session_id'   => $sessionId,
                'product_name' => $name,
                'price'        => $price,
                'quantity'     => 1,
                'image'        => "/img/{$slug}.png",
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }

        CartItem::insert($data);
    }
}
