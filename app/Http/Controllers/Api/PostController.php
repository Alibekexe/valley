<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\Post\PostRecource;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Post\StoreRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return PostRecource::collection(Post::all())->resolve();
    }

    public function show(Post $post)
    {
        return PostRecource::make($post)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $post = Post::create($validated);
        return response()->json($post, 201);
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->update($validated);
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message' => 'Post deleted successfully'
        ], 200);
    }
}
