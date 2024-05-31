<?php

namespace App\Http\Requests\User\Books;

use Illuminate\Foundation\Http\FormRequest;

class GetBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'age_limit_id' => 'nullable|integer|min:0|max:21',
            'author_id' => 'nullable|integer',
            'genre_id' => 'nullable|integer',
            'availability' => 'nullable|integer|min:0|max:1',
        ];
    }
}
