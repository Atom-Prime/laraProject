<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'author_id' => 'required|integer|exists:authors,id',
            'genre_id' => 'required|integer|exists:genres,id',
            'language_id' => 'required|integer|exists:languages,id',
            'year' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'author_id.exists' => 'Автор не найден',
            'author_id.required' => 'Поле автор обязательно',
            'genres_id.exists' => 'Жанр не найден',
            'genres_id.required' => 'Поле жанр обязательно',
            'languages_id.exists' => 'Язык не найден',
            'languages_id.required' => 'Поле язык обязательно',
        ];
    }
}
