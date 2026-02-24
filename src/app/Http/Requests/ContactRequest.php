<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => 'required|string|max:8',
            'first_name' => 'required|string|max:8',
            'gender' => 'required',
            'email' => 'required|email|max:100',
            'tel_1' => 'required|digits_between:1,5',
            'tel_2' => 'required|digits_between:1,5',
            'tel_3' => 'required|digits_between:1,5',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'category_id' => 'required',
            'detail' => 'required|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓は必須項目です。',
            'last_name.string' => '姓は文字列でなければなりません。',
            'last_name.max' => '姓は8文字以内で入力してください。',
            'first_name.required' => '名は必須項目です。',
            'first_name.string' => '名は文字列でなければなりません。',
            'first_name.max' => '名は8文字以内で入力してください。',
            'gender.required' => '性別は必須項目です。',
            'email.required' => 'メールアドレスは必須項目です。',
            'email.email' => 'メールアドレスの形式が正しくありません。',
            'email.max' => 'メールアドレスは100文字以内で入力してください。',
            'tel_1.required' => '電話番号は必須項目です。',
            'tel_1.digits_between' => '電話番号は1桁から5桁の数字で入力してください。',
            'tel_2.required' => '電話番号は必須項目です。',
            'tel_2.digits_between' => '電話番号は1桁から5桁の数字で入力してください。',
            'tel_3.required' => '電話番号は必須項目です。',
            'tel_3.digits_between' => '電話番号は1桁から5桁の数字で入力してください。',
            'address.required' => '住所は必須項目です。',
            'address.string' => '住所は文字列でなければなりません。',
            'address.max' => '住所は255文字以内で入力してください。',
            'building.string' => '建物名は文字列でなければなりません。',
            'building.max' => '建物名は255文字以内で入力してください。',
            'category_id.required' => 'お問い合わせの種類は必須項目です。',
            'detail.required' => 'お問い合わせ内容は必須項目です。',
            'detail.string' => 'お問い合わせ内容は文字列でなければなりません。',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください。',
        ];
    }

}
