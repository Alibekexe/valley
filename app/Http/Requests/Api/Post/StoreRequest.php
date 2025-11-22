<?php

namespace App\Http\Requests\Api\Post;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'status' => 'required|string|in:draft,published,archived',
            'description' => 'nullable|string',
            'tag' => 'nullable|string|max:255',
            'img_path' => 'nullable|string|max:500',
            'published_at' => 'nullable|date_format:Y-m-d',
        ];
    }
}
