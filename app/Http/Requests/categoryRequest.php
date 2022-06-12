<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
        'category_name'       => 'required|max:30|unique:category_models,category_name',
        // 'categoryName'       => 'required|max:100',
        // required|numeric
        ];
    }

       public function messages()
    {
        return [
        'category_name.required'        => '  ادخل اسم القسم ',
        'category_name.max'             => '   الاسم يجب ان يكون اقل من 30 حرف ',
        'category_name.unique'          => 'هذا الاسم موجود بالفعل !!'

        ];
    }
}