<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'password'=>'min:0|max:20',
            'confirm_password'=>'same:password',
            'name'=>'required',
            'permission_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'password.min'=>'Password length must be greater than 0 characters!',
            'password.max'=>'Password length must be smaller than 20 characters !',
            'confirm_password.same'=>'Password confirm is not same password !',
            'name.required'=>'Name can not be empty !',
            'permission_id.required'=>'Permission can not be empty !'
        ];
    }
}
