<?php

namespace App\Http\Requests\Travel\destination;

use App\Traits\HandlesTempImageUploads;
use Illuminate\Foundation\Http\FormRequest;

class create extends FormRequest
{
    use HandlesTempImageUploads;
    protected $tempImageFields = ['featured_image', 'cover_image', 'thumbnail_image'];
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
            'name' => 'required',
            'slug' => 'required|unique:destinations,slug,id',
            'location' => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,avif,webp|max:2048',
        ];
    }

}
