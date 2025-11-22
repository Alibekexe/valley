<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name ?? 'Sample User',
            'email' => $request->email ?? 'sample@example.com',
            'password' => $request->password ?? bcrypt('password'),
        ]);
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response([
            'message' => 'user deleted'
        ]);
    }
}
