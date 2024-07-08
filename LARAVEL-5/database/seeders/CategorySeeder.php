<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Technology'],
            ['name' => 'Travel'],
            ['name' => 'Food'],
            ['name' => 'Fashion'],
            ['name' => 'Health'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
