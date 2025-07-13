<?php

namespace App\Modules\UserManagement\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUpdate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('id'); // This will be null on create, user ID on update

        return [
            'name' => [
                'required',
                'regex:/^\S*$/',
                Rule::unique('users', 'name')->ignore($userId),
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],

            'password' => [
                $userId ? 'nullable' : 'required', // required on create, optional on update
                'confirmed',
                'min:6',
            ],

            'role_id' => 'required',
            'status' => 'required',
            'cdp_id' => 'nullable|integer|exists:cdp,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The user name is required.',
            'name.unique' => 'This user name has already been taken.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'A password is required for new users.',
            'role_id.required' => 'Please select a role for the user.',
            'status.required' => 'The user status is required.',
            'name.regex' => 'The username must not contain any spaces.',
            'cdp_id.integer' => 'Please select a valid CDP.',
        ];
    }
}
