<?php

namespace App\Http\Requests\Api\Message;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => 'required|string|max:1000',
            'chat_id' => 'required|exists:chats,id',
            'sender_id' => 'required|exists:users,id',
        ];
    }
}
