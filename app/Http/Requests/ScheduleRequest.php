<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'movie_id' => 'required',
            'start_time_date' => 'required|date|date_format:Y-m-d',
            'start_time_time' => 'required|date_format:H:i',
            'end_time_date'   => 'required|date|date_format:Y-m-d',
            'end_time_time'   => 'required|date_format:H:i',
        ];
    }

    public function messages()
    {
        return [
            'movie_id' => '必須項目です',
            'start_time_date' => '必須項目です',
            'start_time_time' => '必須項目です',
            'end_time_date' => '必須項目です',
            'end_time_time' => '必須項目です',
        ];
    }
}
