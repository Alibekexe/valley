<?php

namespace App\Http\Requests\Api\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => 'required|string|max:1000',
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'parent_id' => 'nullable|exists:comments,id',
        ];
    }
}
