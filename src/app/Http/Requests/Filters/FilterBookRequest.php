<?php

namespace App\Http\Requests\Filters;

use Illuminate\Foundation\Http\FormRequest;

class FilterBookRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'    => 'nullable|string|max:255',
            'author'   => 'nullable|integer',
            'genre'    => 'nullable|integer',
            'language' => 'nullable|integer',
            'year'     => 'nullable|integer',
        ];
    }
}
