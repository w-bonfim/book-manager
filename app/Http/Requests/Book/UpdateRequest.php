<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string|max:25',
            'edition' => 'required|min:0',
            'value' => 'required|numeric|min:0',
            'publisher' => 'required|string',
            'published_year' => 'required|string|max:4',
            'authors' => 'required|array|exists:authors,id',
            'subjects' => 'required|array|exists:subjects,id',
        ];
    }
}
