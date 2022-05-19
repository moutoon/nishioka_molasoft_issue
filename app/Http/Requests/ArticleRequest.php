<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'account_id' => 'required|integer',
            'text' => 'required|max:140',
            'time' => 'required|min:1|max:24|integer',
            'genre' => 'required|in:PHP, Ruby, Python, JavaScript, その他の言語',
        ];
    }

    /**
     * エラーメッセージのカスタマイズ
     */
    public function messages()
    {
        return [
            'account_id.required' => 'ユーザーIDは必須です',
            'account_id.integer' => 'ユーザーIDは整数で入力してください',
            'text.required' => '本文は必須です',
            'text.max:140' => '本文は140文字以内で入力してください',
            'time.required' => '学習時間は必須です',
            'time.min' => '学習時間は1以上、24以内の整数で入力してください',
            'time.max' => '学習時間は1以上、24以内の整数で入力してください',
            'time.integer' => '学習時間は整数で入力してください',
            'genre.required' => '学習ジャンルは必須です',
            'genre.in' => '学習ジャンルは「PHP」「Ruby」「Python」「JavaScript」「その他の言語」の中から入力してください'
        ];
    }

    /**
     *　エラー情報をJSONで返す
     */
    protected function failedValidation(Validator $validator)
    {
        $res = response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ], 400);
        throw new HttpResponseException($res);
    }
}
