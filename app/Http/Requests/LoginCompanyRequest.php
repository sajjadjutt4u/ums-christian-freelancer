<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginCompanyRequest extends FormRequest
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
            'email' => [
                'required',
                'exists:companies,email',
            ],
            'password' => [
                'required',
                'exists:companies,password',
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please Enter the email address.',
            'password.required' => 'Please Enter the email password.',
        ];
    }
}
