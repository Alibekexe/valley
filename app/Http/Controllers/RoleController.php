<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() { return Role::all(); }
    public function create() { return response()->json(['message' => 'show create role form']); }
    public function store(Request $request) {
        $data = $request->validate(['title' => 'required|string|max:255']);
        return Role::create($data);
    }
    public function show(Role $role) { return $role; }
    public function edit(Role $role) { return response()->json($role); }
    public function update(Request $request, Role $role) {
        $data = $request->validate(['title' => 'sometimes|required|string|max:255']);
        $role->update($data);
        return $role;
    }
    public function destroy(Role $role) { $role->delete(); return response()->json(['message' => 'deleted']); }
}
