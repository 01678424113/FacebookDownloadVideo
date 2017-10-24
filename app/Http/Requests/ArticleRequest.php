<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required',
            'txt_description'=>'required',
            'txt_content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Must not to blank title !',
            'txt_description.required' => 'Must not to blank description',
            'txt_content.required' => 'Must not to blank content'
        ];
    }
}
