<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'Laptop', 'price' => 543.15],
            ['name' => 'Book', 'price' => 11.99],
            ['name' => 'Shirt', 'price' => 53.99],
            ['name' => 'Pen', 'price' => 34.99],
            ['name' => 'Chair', 'price' => 12.99],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
