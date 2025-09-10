<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function store()
    {

        $post = Post::create([
            'title' => 'adasfd',
            'author' => 'afdsf',
            'content' => 'This is the content of the post',
            'category' => 'General',
            'status' => 'published',
        ]);
        return $post;
    }

    public function update(Post $post)
    {
        $post->update([
            'content' => 'This is the updated post',
        ]);
        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response([
            'message' => 'post deleted'
        ]);
    }
}
