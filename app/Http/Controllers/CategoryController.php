<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view("categories", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request) : RedirectResponse
    {
        $category = Category::create(['name' => $request->validated()['name']]);
        return Redirect::route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
       return "show: ".$category->name;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category'=> $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category) : RedirectResponse
    {
        $category->name = $request->validated()['name'];
        $category->save();
        return Redirect::route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) : RedirectResponse
    {
       $category->delete();
       return Redirect::route('categories.index');
    }
}
