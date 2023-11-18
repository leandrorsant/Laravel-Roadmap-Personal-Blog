<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->count(5000)->create()->each(function (Article $article) {
            $article->category()->associate(Category::inRandomOrder()->first());
            $article->tags()->attach(Tag::inRandomOrder()->limit(random_int(0, Tag::count()))->get());
            $article->saveQuietly();
        });
        // $category = Category::inRandomOrder()->first();
        // $tag = Tag::inRandomOrder()->get()->first();
        // $article = new Article();
        // $article->save();
        // $article->category()->associate($category);
        // $article->tags()->attach($tag);
    }
}
