<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function create()
    {
        return response()->json(['message' => 'show create category form']);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['title' => 'required|string|max:255']);
        return Category::create($data);
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function edit(Category $category)
    {
        return response()->json($category);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate(['title' => 'sometimes|required|string|max:255']);
        $category->update($data);
        return $category;
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'deleted']);
    }
}
