<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
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
            'comment'=>'required | string | max:2500',
        ];
    }

    public function messages()
    {
        return [
            'comment.required'=>'コメント内容を入力してください。',
            'comment.string'=>'文字列型で入力してください。',
            'comment.max'=>'2,500文字以内でコメントしてください。',
        ];
    }
}
