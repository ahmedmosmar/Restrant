<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    protected $table="supplier_models";
    protected $primaryKey="id";
    protected $fillable =[
        'id','supplier_name','phone_number','created_at','updated_at'
    ];

     public function buys_Fun_Relation(){
            return $this->hasMany('App\Models\BuysModel','supplier_id');
     }
}