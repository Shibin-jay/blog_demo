<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        // Add some sample tags
        Tag::create([
            'name' => 'Laravel',
        ]);

        Tag::create([
            'name' => 'VueJS',
        ]);

        Tag::create([
            'name' => 'PHP',
        ]);

        Tag::create([
            'name' => 'JavaScript',
        ]);

        // You can add more tags here
    }
}
