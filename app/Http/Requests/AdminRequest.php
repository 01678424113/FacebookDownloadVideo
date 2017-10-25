<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'username'=>'required|unique:users,username',
            'password'=>'required|min:5|max:20',
            'confirm_password'=>'required|same:password',
            'name'=>'required',
            'permission'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'Username can not be empty !',
            'username.unique'=>'Username have existed !',
            'password.required'=>'Password can not be empty !',
            'password.min'=>'Password length must be greater than 5 characters!',
            'password.max'=>'Password length must be smaller than 20 characters !',
            'confirm_password.required'=>'Password confirm can not be empty !',
            'confirm_password.same'=>'Password confirm is not same password !',
            'name.required'=>'Name can not be empty !',
            'permission.required'=>'Permission can not be empty !'

        ];
    }
}
