<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index() { return Chat::all(); }
    public function create() { return response()->json(['message' => 'show create chat form']); }
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);
        return Chat::create($data);
    }
    public function show(Chat $chat) { return $chat; }
    public function edit(Chat $chat) { return response()->json($chat); }
    public function update(Request $request, Chat $chat) {
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
        ]);
        $chat->update($data);
        return $chat;
    }
    public function destroy(Chat $chat) { $chat->delete(); return response()->json(['message' => 'deleted']); }
}
