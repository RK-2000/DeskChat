<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:7'
        ];
    }

    public function messages()
    {
    return [
        'name.required' => 'A name is required',
        'email.required' => 'A email is required',
        'password.required' => 'A password is required',
        'password.min' => 'Minimum 7 character password needed',
        'email.unique' => 'Email already exists',
    ];
    }
}
