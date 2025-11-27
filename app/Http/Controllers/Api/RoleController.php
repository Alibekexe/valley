<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Http\Requests\Api\Role\StoreRequest;
use App\Http\Requests\Api\Role\UpdateRequest;
use App\Http\Resources\Role\RoleResource;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        return RoleResource::collection(Role::all())->resolve();
    }

    public function create() { return response()->json(['message' => 'show create role form']); }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $role = Role::create($data);
        return RoleResource::make($role)->resolve();
    }

    public function show(Role $role)
    {
        return RoleResource::make($role)->resolve();
    }

    public function update(UpdateRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);
        return RoleResource::make($role)->resolve();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(['message' => 'Role deleted successfully']);
    }
}
