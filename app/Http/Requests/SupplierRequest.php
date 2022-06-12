<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'supplier_name'           => 'required|max:100',
            'phone_number'            => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'supplier_name.max'               => ' عدد الاحرف  يجب ان يكون اقل من 100 حرف ',
            'supplier_name.required'          => ' ادخل الاسم ',
            'phone_number.required'           => ' ادخل  رقم الهاتف ',
            'phone_number.max'                => '   الرقم غير صحيح ',
            'phone_number.numeric'            => '   الرقم غير صحيح ',
        ];
    }
}