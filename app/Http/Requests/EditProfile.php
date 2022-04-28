<?php

namespace App\Http\Requests;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'required|unique:users,email,'.Auth::id(),
            'name' => 'required',
            'dob' => 'required|date',
            'phone' => 'required|digits:10',
            'desciption' => 'required',
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
