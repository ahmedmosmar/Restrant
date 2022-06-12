<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
     protected $table="order_models";
    protected $primaryKey="id";
    protected $fillable =[
        'id','type_id','type_amount','type_price','sales_table','status','reset_id','created_at','updated_at'
    ];

       public function type_Fun_Relation()
        {
            return $this->belongsTo('App\Models\TypeModel','type_id');
        }
}