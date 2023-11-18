<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Article;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // $category = Category::inRandomOrder()->first();
        // $tag = Tag::inRandomOrder()->get()->first();
        // $article = new Article();
        // $article->save();
        // $article->category()->associate($category);
        // $article->tags()->attach($tag);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
