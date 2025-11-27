<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Http\Requests\Api\Tag\StoreRequest;
use App\Http\Requests\Api\Tag\UpdateRequest;
use App\Http\Resources\Tag\TagResource;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::all())->resolve();
    }

    public function create() { return response()->json(['message' => 'show create tag form']); }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::create($data);
        return TagResource::make($tag)->resolve();
    }

    public function show(Tag $tag)
    {
        return TagResource::make($tag)->resolve();
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return TagResource::make($tag)->resolve();
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(['message' => 'Tag deleted successfully']);
    }
}
