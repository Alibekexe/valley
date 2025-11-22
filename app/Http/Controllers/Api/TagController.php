<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() { return Tag::all(); }
    public function create() { return response()->json(['message' => 'show create tag form']); }
    public function store(Request $request) {
        $data = $request->validate(['title' => 'required|string|max:255']);
        return Tag::create($data);
    }
    public function show(Tag $tag) { return $tag; }
    public function edit(Tag $tag) { return response()->json($tag); }
    public function update(Request $request, Tag $tag) {
        $data = $request->validate(['title' => 'sometimes|required|string|max:255']);
        $tag->update($data);
        return $tag;
    }
    public function destroy(Tag $tag) { $tag->delete(); return response()->json(['message' => 'deleted']); }
}
