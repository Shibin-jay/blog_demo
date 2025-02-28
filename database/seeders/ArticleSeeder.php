<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Seed 10 sample articles
        for ($i = 0; $i < 10; $i++) {
            $article = Article::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => 'default_image.jpg', // You can use a sample image
                'category_id' => Category::inRandomOrder()->first()->id, // Random category
            ]);

            // Attach some random tags to the article
            $article->tags()->attach(
                Tag::inRandomOrder()->limit(2)->pluck('id')->toArray()
            );
        }
    }
}
