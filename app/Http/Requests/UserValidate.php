<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserValidate extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:4|max:50',
            // 'mobile' => 'nullable|digits:10|unique:users,id|numeric',
            'email' => 'required|unique:users,email',
            'address' => 'nullable|string|min:5|max:150',
            'password' => [
                'required', 'string', Password::min(5)
                // ->letters()
                // ->mixedCase()->symbols()->uncompromised(),
            ],
        ];
    }
}
