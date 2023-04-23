<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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

     protected function prepareForValidation()
     {
        $year_month_day = ($this->filled(['old_year', 'old_month','old_day'])) ? $this->old_year .' '. $this->old_month .' '. $this->old_day : '';
        $this->merge([
            'year_month_day' => $year_month_day
        ]);
}
    public function rules()
    {
        return [
            'over_name'=>'required|string|max:10',
            'under_name'=>'required|string|max:10',
            'over_name_kana'=>'required|string|regex:/^[ァ-ヶー]+$/u|max:30',
            'under_name_kana'=>'required|string|regex:/^[ァ-ヶー]+$/u
|max:30',
            'mail_address'=>'required|email|unique:users,mail_address|max:100',
            'sex'=>'required|in:1,2,3',
            'old_year'=>'required|after:2000',
            'old_month'=>'required|between:1,12',
            'old_day'=>'required|between:1,31',
            'year_month_day'=>'before_or_equal:today',
            'role'=>'required|in:1,2,3,4',
            'password'=>'required|between:8,30|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'over_name.required'=>'入力必須項目です。',
            'over_name.string'=>'文字列で入力してください。',
            'over_name.max'=>'10文字以下で入力してください。',
            'under_name.required'=>'入力必須項目です。',
            'under_name.string'=>'文字列で入力してください。',
            'under_name.max'=>'10文字以下で入力してください。',
            'over_name_kana.required'=>'入力必須項目です。',
            'over_name_kana.string'=>'文字列で入力してください。',
            'over_name_kana.regex'=>'カタカナで入力してください。',
            'over_name_kana.max'=>'30文字以下で入力してください。',
            'under_name_kana.required'=>'入力必須項目です。',
            'under_name_kana.string'=>'文字列で入力してください。',
            'under_name_kana.regex'=>'カタカナで入力してください。',
            'under_name_kana.max'=>'30文字以下で入力してください。',
            'mail_address.required'=>'入力必須項目です。',
            'mail_address.email'=>'メール形式で入力してください。',
            'mail_address.unique'=>'既に登録されているアドレスです。',
            'mail_address.max'=>'100文字以下で入力してください。',
            'sex.required'=>'選択必須項目です。',
            'sex.in'=>'男性、女性、その他のいずれかを選択してください。',
            'old_year.required'=>'年は入力必須項目です。',
            'old_year.after'=>'2000年以降を選択してください。',
            'old_month.required'=>'月は入力必須項目です。',
            'old_month.between'=>'1月から12月のいずれかを選択してください。',
            'old_day.required'=>'日は入力必須項目です。',
            'old_day.between'=>'1日から31日のいずれかを選択してください。',
            'year_month_day.before_or_equal'=>'2000年1月1日以降の日付を入力してください。',
            'role.required'=>'選択必須項目です。',
            'role.in'=>'国語/数学/英語の教師または生徒のいずれかを選択してください。',
            'password.required'=>'入力必須項目です。',
            'password.between'=>'8文字以上、30文字以下で入力してください。',
            'password.confirmed'=>'確認用パスワードと一致しません。'
        ];
    }
}
