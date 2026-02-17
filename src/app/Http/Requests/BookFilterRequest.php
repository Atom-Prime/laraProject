<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFilterRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'       => 'nullable|string|max:255',
            'author_id'   => 'nullable|integer',
            'genre_id'    => 'nullable|integer',
            'language_id' => 'nullable|integer',
            'year'        => 'nullable|integer',
        ];
    }
}
