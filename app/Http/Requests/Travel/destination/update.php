<?php

namespace App\Http\Requests\Travel\destination;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class update extends FormRequest
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
        $id = $this->route()->parameter('id');

        return [
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('destinations', 'slug')->ignore($id),
            ],
            'location' => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,avif,webp|max:2048',
        ];
    }
}
