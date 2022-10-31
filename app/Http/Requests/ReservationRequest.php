<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'required|max:255',
            'email'    => 'required|max:255|email',
            "schedule_id" => 'required',
            "screening_date" => 'required',
            "sheet_id" => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => '入力してください',
            'name.max'       => '120文字以内',
            'email.required' => '入力してください',
            'email.max'   => '255文字以内',
            'email.email' => 'メアドを入力',
        ];
    }
}
