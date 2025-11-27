<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use App\Http\Requests\Api\Comment\StoreRequest;
use App\Http\Requests\Api\Comment\UpdateRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all())->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $comment = Comment::create($data);
        return CommentResource::make($comment)->resolve();
    }

    public function show(Comment $comment)
    {
        return CommentResource::make($comment)->resolve();
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return CommentResource::make($comment)->resolve();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
