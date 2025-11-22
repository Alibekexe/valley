<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Chat\StoreRequest;
use App\Http\Requests\Api\Chat\UpdateRequest;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return Chat::all();
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
        return $chat;
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
