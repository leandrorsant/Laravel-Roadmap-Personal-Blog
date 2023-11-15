<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Article extends Model
{
    use HasFactory;
    /*
    $article->category()->first();
    $article->category()->associate($category)
    $article->tags()->attach($tag)
    */
    protected $attributes = [
        'title' =>'new article',
        'full_text' =>'new article full text',
        'image' => null,
    ];
    protected $fillable = [
        'title',
        'full_text',
        'image'
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
