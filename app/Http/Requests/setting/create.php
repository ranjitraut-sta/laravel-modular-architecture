<?php

namespace App\Http\Requests\setting;

use Illuminate\Foundation\Http\FormRequest;

class create extends FormRequest
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
            'site_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:512',
            'default_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:512',
        ];
    }
}
