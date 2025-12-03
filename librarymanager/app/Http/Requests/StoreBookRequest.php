<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'author' =>['required', 'string', 'min:3' ],
            'isbn' =>['required', 'string', 'size:13', 'unique:books,isbn'],
            'published_year' =>['nullable', 'integer', 'between:1900,<aktuelles Jahr>'],
            'category' =>['nullable', 'string'] 
        ];

    }

}