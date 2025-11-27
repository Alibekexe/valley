<?php

namespace App\Http\Requests\Api\Message;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => 'sometimes|required|string|max:1000',
            'is_read' => 'sometimes|boolean',
        ];
    }
}
