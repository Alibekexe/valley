<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() { return Profile::all(); }
    public function create() { return response()->json(['message' => 'show create profile form']); }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age' => 'required|integer',
            'description' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'login' => 'required|string|max:255',
        ]);
        return Profile::create($data);
    }
    public function show(Profile $profile) { return $profile; }
    public function edit(Profile $profile) { return response()->json($profile); }
    public function update(Request $request, Profile $profile) {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'surname' => 'sometimes|required|string|max:255',
            'age' => 'sometimes|required|integer',
            'description' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'login' => 'sometimes|required|string|max:255',
        ]);
        $profile->update($data);
        return $profile;
    }
    public function destroy(Profile $profile) { $profile->delete(); return response()->json(['message' => 'deleted']); }
}
