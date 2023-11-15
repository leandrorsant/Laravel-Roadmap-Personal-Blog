<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request) : RedirectResponse
    {
        Article::create([
            'title' => $request->validated()['title'],
            'full_text' => $request->validated()['full_text']
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
        $article->delete();
        return Redirect::to('/');
    }
}
