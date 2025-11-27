<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Category\StoreRequest;
use App\Http\Requests\Api\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;


class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all())->resolve();
    }

    public function create()
    {
        return response()->json(['message' => 'show create category form']);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        return Category::create($data);

    }

    public function show(Category $category)
    {
        return CategoryResource::make($category)->resolve();
    }

    public function edit(Category $category)
    {
        return response()->json($category);
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return $category;
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'deleted']);
    }
}
