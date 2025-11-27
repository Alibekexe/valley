<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Chat\StoreRequest;
use App\Http\Requests\Api\Chat\UpdateRequest;
use App\Http\Resources\Chat\ChatResource;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return ChatResource::collection(Chat::all())->resolve();
    }

    public function create()
    {
        return response()->json(['message' => 'show create chat form']);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        return Chat::create($data);
    }

    public function show(Chat $chat)
    {
        return ChatResource::make($chat)->resolve();
    }

    public function edit(Chat $chat)
    {
        return response()->json($chat);
    }

    public function update(UpdateRequest $request, Chat $chat)
    {
        $data = $request->validated();
        $chat->update($data);
        return $chat;
    }

    public function destroy(Chat $chat)
    {
        $chat->delete();
        return response()->json(['message' => 'deleted']);
    }
}
