<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index() { return Image::all(); }
    public function create() { return response()->json(['message' => 'show create image form']); }
    public function store(Request $request) {
        $data = $request->validate(['path' => 'required|string|max:255']);
        return Image::create($data);
    }
    public function show(Image $image) { return $image; }
    public function edit(Image $image) { return response()->json($image); }
    public function update(Request $request, Image $image) {
        $data = $request->validate(['path' => 'sometimes|required|string|max:255']);
        $image->update($data);
        return $image;
    }
    public function destroy(Image $image) { $image->delete(); return response()->json(['message' => 'deleted']); }
}
