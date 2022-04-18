<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfile extends FormRequest
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
            'email' => 'required|unique:user',
            'name' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'bio' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'email.required' => 'A email is required',
            'password.required' => 'A password is required',
            'email.unique' => 'Email already exists',
        ];
    }
}
