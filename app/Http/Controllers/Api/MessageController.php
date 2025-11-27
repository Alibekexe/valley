<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use App\Http\Requests\Api\Message\StoreRequest;
use App\Http\Requests\Api\Message\UpdateRequest;
use App\Http\Resources\Message\MessageResource;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        return MessageResource::collection(Message::all())->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $message = Message::create($data);
        return MessageResource::make($message)->resolve();
    }

    public function show(Message $message)
    {
        return MessageResource::make($message)->resolve();
    }

    public function update(UpdateRequest $request, Message $message)
    {
        $data = $request->validated();
        $message->update($data);
        return MessageResource::make($message)->resolve();
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return response()->json(['message' => 'Message deleted successfully']);
    }
}
