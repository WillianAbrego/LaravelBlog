<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'cover_image' => ['mimes:png,jpg,svg,gif', 'max:2048'],
            'title' => ['required', 'max:200', 'min:10'],
            'category_id' => ['required'],
            'body' => ['required', 'min:5'],
            'published_at' => ['required'],
            'tags' => ['required'],
            'meta_description' => ['required', 'min:5', 'max:250']

        ];
    }
}
