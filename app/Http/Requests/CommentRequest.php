<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'user' => 'required',
            'name' => 'required',
            'content' => 'required',
        ];
    }

    public function messages(){
        return [
            'user.required' => '用户名不能为空',
            'name.required' => '标题不能为空',
            'content.required' => '内容不能为空',
        ];
    }
}
