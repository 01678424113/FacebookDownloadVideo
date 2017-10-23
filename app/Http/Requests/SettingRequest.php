<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'key_setting' => 'required',
            'value_setting' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'key_setting.required' => 'Must not to blank key_setting !',
            'value_setting.required' => 'Must not to blank value_setting !'
        ];
    }
}