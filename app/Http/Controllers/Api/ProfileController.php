<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\StoreRequest;
use App\Http\Requests\Api\Profile\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return ProfileResource::collection(Profile::all())->resolve();
    }

    public function create()
    {
        return response()->json(['message' => 'show create profile form']);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        return Profile::create($data);
    }

    public function show(Profile $profile)
    {
        return ProfileResource::make($profile)->resolve();
    }

    public function edit(Profile $profile)
    {
        return response()->json($profile);
    }

    public function update(UpdateRequest $request, Profile $profile)
    {
        $data = $request->validated();
        $profile->update($data);
        return $profile;
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json(['message' => 'deleted']);
    }
}
