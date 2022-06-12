<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuysModel extends Model
{

    protected $table="buys_models";
    protected $primaryKey="id";
    protected $fillable =[
        'id','supplier_id','component','unit','amount','unit_price','final_price','description','created_at','updated_at'
    ];

     public function supplier_Fun_Relation(){
            return $this->belongsTo('App\Models\SupplierModel','supplier_id');
     }
}