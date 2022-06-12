<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
        'category_id'     => 'required',
        'type_name'       => 'required|max:50',
        'price_sale'       => 'required|numeric',
        // 'price_cost'       => 'required|numeric',
        // 'time_make'        => 'required',
        // required|numeric
        ];
    }
       public function messages()
    {
        return [
        'category_id.required'      => '   إختر اسم القسم ',
        'type_name.required'        => '   ادخل اسم الصنف',
        'type_name.max'             => '   الاسم يجب ان يكون اقل من 50 حرف ',
        // 'type_name.unique'          => '   هذا الاسم موجود بالفعل !!',
        'price_sale.required'       => '   ادخل سعر الصنف',
        'price_sale.numeric'        => '   السعر يجب ان يكون ارقام ',
        // 'price_cost.required'       => '   ادخل سعر التكلفة',
        // 'price_cost.numeric'        => '   السعر يجب ان يكون ارقام ',
        // 'time_make.required'        => '   إختر  الزمن ',

        ];
    }
}