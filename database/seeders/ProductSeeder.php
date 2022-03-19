<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductHistory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amplopColours = ["0", 'A', 'B', "C", 'D', "E", 'F', 'G', "H", 'I', "J", ];
        for ($i = 1; $i <= 10; $i++) {
            $randomQuantity = rand(20, 40);
            Product::create([
                'id' => $i,
                'code' => 'ATK00' .  $i,
                'title' => 'Amplop ' . $amplopColours[$i] . ' coklat',
                'unit_type' => 'pack',
                'stock_quantity' => $randomQuantity,
                'location' => 'L1-R1A'
            ]);
            ProductHistory::create([
                'id' => $i,
                'user_request_id' => $i,
                'product_id' => $i,
                'type' => 'in',
                'quantity' => $randomQuantity
            ]);
        }
    }
}
