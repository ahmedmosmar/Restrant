<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeatersRequest extends FormRequest
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


    public function rules()
    {
        return [
            'weater_name'       => 'required|max:50',
        ];
    }

        public function messages()
    {
        return [
        'weater_name.required'      => '     ادخل اسم الويتر ',
        'weater_name.max'             => '   الاسم يجب ان يكون اقل من 50 حرف ',
        ];
    }
}