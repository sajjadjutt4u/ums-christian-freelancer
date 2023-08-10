<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name'                      =>          'required',
            'email'                     =>          'required|unique:users,email',
            'password'                  =>          'required|min:6|confirmed',
            'address'                   =>          'required|max:100',
            'phone'                     =>          'nullable|numeric|min:0',
            'description'               =>          'nullable|max:250',
            'personal_image'            =>          'nullable|image|mimes:jpeg,png,jpg',
            'business_image'            =>          'nullable|image|mimes:jpeg,png,jpg',
            'cnic_front_image'          =>          'nullable|image|mimes:jpeg,png,jpg',
            'cnic_back_image'           =>          'nullable|image|mimes:jpeg,png,jpg',
            'cv'                        =>          'nullable|mimes:pdf',
        ];
    }

    public function messages():array
    {
        return [
            'name.required'            => 'Please enter the name.',
            'email.required'           => 'Please enter the email.',
            'email.unique'             => 'The email address is already taken.',
            'password.required'        => 'Please enter the password.',
            'password.confirmed'       => 'Passwords do not match.',
            'address.required'         => 'Please enter the address.',
            'phone.numeric'            => 'Phone number should be numeric.',
            'phone.min'                => 'Not allowed negative number in the phone number.',
            'phone.max'                => 'Phone number should not be greater than 15 digits.',
            'description.max'          => 'Description should not be greater than 200 characters.',
            'personal_image.image'     => 'Image should be allowed only in jpeg, png, jpg format.',
            'business_image.image'     => 'Image should be allowed only in jpeg, png, jpg format.',
            'cnic_front_image.image'   => 'Image should be allowed only in jpeg, png, jpg format.',
            'cnic_back_image.image'    => 'Image should be allowed only in jpeg, png, jpg format.', // Added '.image' here
            'cv.mimes'                 => 'CV file allowed only in pdf format.',
        ];
    }
}
