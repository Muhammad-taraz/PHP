<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['New', 'Sale', 'Popular', 'Limited Edition', 'Exclusive'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
