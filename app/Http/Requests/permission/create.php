<?php

namespace App\Http\Requests\permission;

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
            'name' => ['required', 'string', 'max:255'],
            'action' => ['required', 'string', 'max:255'],
            'controller' => ['required', 'string', 'max:255'],
            'group_name' => ['required', 'string', 'max:255',],
        ];
    }
}
