<?php

namespace App\Http\Requests\Api\Image;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => 'required|string|max:500',
            'imageable_id' => 'required|integer',
            'imageable_type' => 'required|string|in:App\\Models\\Post,App\\Models\\User',
            'alt_text' => 'nullable|string|max:255',
        ];
    }
}
