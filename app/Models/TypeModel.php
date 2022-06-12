<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    protected $table = "type_models";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'category_id',
        'type_name',
        'price_sale',
        'price_cost',
        'time_make',
        'created_at',
        'updated_at'
    ];
    public function Order_Fun_Relation()
    {
        return $this->hasMany('App\Models\OrderModel', 'type_id');
    }

    public function Category_Fun_Relation()
    {
        return $this->belongsTo('App\Models\CategoryModel', 'category_id');
    }
}