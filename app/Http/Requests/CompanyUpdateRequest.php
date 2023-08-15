<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateRequest extends FormRequest
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
        $user_data = session('company_data');
        return [
            'name'                      =>          'required',
            'owner_name'                =>          'required',
            'email'                     =>          ['required',
                                                        Rule::unique('companies','email')->ignore($user_data['id'])
            ],
            'password'                  =>          'nullable|min:6|confirmed',
            'address'                   =>          'nullable|max:100',
            'industry'                  =>          'required',
            'country'                   =>          'required',
            'city'                      =>          'required',
            'phone'                     =>          'nullable|numeric|min:0',
            'description'               =>          'nullable|max:250',
            'website_url'               =>          'nullable|max:50',
//            'docs'                      =>          'nullable|mimes:pdf',
        ];
    }

    public function messages():array
    {
        return [
            'name.required'            => 'Please enter the name.',
            'owner_name.required'      => 'Please enter the Owner name.',
            'email.required'           => 'Please enter the email.',
            'email.unique'             => 'The email address is already taken.',
//            'password.required'        => 'Please enter the password.',
            'password.confirmed'       => 'Passwords do not match.',
            'address.required'         => 'Please enter the address.',
            'industry.required'        => 'Please enter the industry.',
            'country.required'         => 'Please enter the country.',
            'city.required'            => 'Please enter the city.',
            'phone.numeric'            => 'Phone number should be numeric.',
            'phone.min'                => 'Not allowed negative number in the phone number.',
            'description.max'          => 'Description should not be greater than 200 characters.',
            'website_url.max'          => 'URL should not be greater than 50 characters.',
            'docs.mimes'               => 'CV file allowed only in pdf format.',
        ];
    }
}
