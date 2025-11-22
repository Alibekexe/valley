<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() { return Comment::all(); }
    public function create() { return response()->json(['message' => 'show create comment form']); }
    public function store(Request $request) {
        $data = $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'like' => 'nullable|integer',
            'post_id' => 'required|integer',
            'parent_id' => 'nullable|integer',
        ]);
        return Comment::create($data);
    }
    public function show(Comment $comment) { return $comment; }
    public function edit(Comment $comment) { return response()->json($comment); }
    public function update(Request $request, Comment $comment) {
        $data = $request->validate([
            'author' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'like' => 'nullable|integer',
        ]);
        $comment->update($data);
        return $comment;
    }
    public function destroy(Comment $comment) { $comment->delete(); return response()->json(['message' => 'deleted']); }
}
