<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Http\Requests\Api\Image\StoreRequest;
use App\Http\Requests\Api\Image\UpdateRequest;
use App\Http\Resources\Image\ImageResource;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
        return ImageResource::collection(Image::all())->resolve();
    }

    public function create() { return response()->json(['message' => 'show create image form']); }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $image = Image::create($data);
        return ImageResource::make($image)->resolve();
    }

    public function show(Image $image)
    {
        return ImageResource::make($image)->resolve();
    }

    public function update(UpdateRequest $request, Image $image)
    {
        $data = $request->validated();
        $image->update($data);
        return ImageResource::make($image)->resolve();
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return response()->json(['message' => 'Image deleted successfully']);
    }
}
