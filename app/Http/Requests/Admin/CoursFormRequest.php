<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CoursFormRequest extends FormRequest
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
            'title' => ['required', 'min:8'],
            'description' => ['required', 'min:8'],
            'thumbnail' => ['required', 'mimes:jpg,jpeg,png,gif,webp'],
            'video' => ['required', 'mimes:mp4,mov,ogg,avi'],
            'price' => ['required'],
            'disponible' => ['required'],
            'sold' => ['required'],
        ];
    }
}
