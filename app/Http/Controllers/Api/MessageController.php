<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() { return Message::all(); }
    public function create() { return response()->json(['message' => 'show create message form']); }
    public function store(Request $request) {
        $data = $request->validate([
            'author' => 'required|string|max:255',
            'chat_id' => 'required|integer',
            'content' => 'required|string',
        ]);
        return Message::create($data);
    }
    public function show(Message $message) { return $message; }
    public function edit(Message $message) { return response()->json($message); }
    public function update(Request $request, Message $message) {
        $data = $request->validate([
            'author' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);
        $message->update($data);
        return $message;
    }
    public function destroy(Message $message) { $message->delete(); return response()->json(['message' => 'deleted']); }
}
