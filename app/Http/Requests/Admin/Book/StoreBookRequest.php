<?php

namespace App\Http\Requests\Admin\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:64'],
            'authors_id' => ['required', 'array', 'exists:authors,id'],
            'genres_id' => ['required', 'array', 'exists:genres,id'],
            'publishers_id' => ['required', 'array', 'exists:publishers,id'],
            'age_limit_id'=> ['required', 'integer', 'exists:age_limits,id'],
            'release_date' => ['required', 'date'],
            'short_description' => ['required', 'string', 'max:255'],
            'full_description' => ['required', 'string', 'max: 1100'],
            'subscription_type_id' => ['required', 'integer', 'exists:subscription_types,id'],
            'image' => ['required', 'dimensions:width=700,height=900'],
            'text' => ['required'],
        ];
    }
}
