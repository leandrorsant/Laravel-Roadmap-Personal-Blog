<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $image = $request->file('image');
        
        if($image){
            $request->validated()['image']->storePubliclyAs('public', $request->file('image')->getClientOriginalName());
        }
         Article::create([
             'title' => $request->validated()['title'],
             'full_text' => $request->validated()['full_text'],
             'image' => $image? $request->validated()['image']->getClientOriginalName() : null
         ]);
        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article) : RedirectResponse
    {
        if($article->image)
            Storage::delete('public/'.$article->image);

        $article->delete();
        return Redirect::to('/');
    }
}
