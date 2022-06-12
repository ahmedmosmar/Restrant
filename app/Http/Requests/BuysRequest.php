<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuysRequest extends FormRequest
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
        'supplier_id'      => 'required',
        'component'        => 'required|max:50',
        'unit'            => 'required|max:50',
        'amount'           => 'required|max:50000|numeric',
        'unit_price'       => 'required|max:50000|numeric',
        'final_price'      => 'max:500000000000|numeric',
        // // required|numeric
        ];
    }

       public function messages()
    {
        return [
        'supplier_id.required'      => ' إختر اسم المورد  ',
        'component.required'        => ' ادخل  المكون ',
        'component.max'             => ' عدد الاحرف يجب ان يكون اقل من 50 حرف',
        'unit.required'             => ' ادخل  الوحدة ',
        'unit.max'                  => ' عدد الارقام  يجب ان يكون اقل من 50 رقم ',
        'amount.required'           => ' ادخل  الكمية ',
        'amount.max'                => ' الكمية كبيره',
        'amount.numeric'            => ' الحقل يجب ان يكون ارقام ',
        'unit_price.required'       => ' ادخل  سعر الوحدة ',
        'unit_price.max'            => ' عدد الارقام  يجب ان يكون اقل من 30 رقم ',
        'unit_price.numeric'        => ' الحقل يجب ان يكون ارقام ',



        ];
    }
}