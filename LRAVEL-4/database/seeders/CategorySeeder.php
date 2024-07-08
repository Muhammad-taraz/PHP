<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->updateOrInsert(
            ['id' => 1],
            ['name' => 'Electronics']
        );

        DB::table('categories')->updateOrInsert(
            ['id' => 2],
            ['name' => 'Fashion']
        );

        DB::table('categories')->updateOrInsert(
            ['id' => 3],
            ['name' => 'Home']
        );

        DB::table('categories')->updateOrInsert(
            ['id' => 4],
            ['name' => 'Sports']
        );

        DB::table('subcategories')->updateOrInsert(
            ['id' => 1],
            ['name' => 'Electronics - Laptops', 'parent_id' => 1]
        );

        DB::table('subcategories')->updateOrInsert(
            ['id' => 2],
            ['name' => 'Electronics - Smartphones', 'parent_id' => 1]
        );

        DB::table('subcategories')->updateOrInsert(
            ['id' => 3],
            ['name' => 'Fashion - Clothing', 'parent_id' => 2]
        );

        DB::table('subcategories')->updateOrInsert(
            ['id' => 4],
            ['name' => 'Home - Furniture', 'parent_id' => 3]
        );

        DB::table('subcategories')->updateOrInsert(
            ['id' => 5],
            ['name' => 'Sports - Equipment', 'parent_id' => 4]
        );
    }
} 