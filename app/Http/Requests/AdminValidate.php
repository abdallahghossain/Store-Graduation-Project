<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminValidate extends FormRequest
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
            'mobile' => 'required|digits:10|unique:admins,id|numeric',
            'email' => 'required|unique:admins,email',
            'address' => 'required|string|min:5|max:150',
            'image' => 'required|image|mimes:jpg,png,jpeg|',
            'status' => 'nullable|string|in:active,archived',
            'password' => [
                'required', 'string',
                // Password::min(5)->letters()
                // ->mixedCase()->symbols()->uncompromised(),
            ],
            'roles_name' => 'required',
        ];
    }
}
