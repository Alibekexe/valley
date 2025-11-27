<?php

namespace App\Http\Requests\Api\Image;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => 'sometimes|required|string|max:500',
            'alt_text' => 'nullable|string|max:255',
        ];
    }
}
