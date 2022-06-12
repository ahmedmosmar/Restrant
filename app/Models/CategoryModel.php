<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{

    protected $table="category_models";
    protected $primaryKey="id";
    protected $fillable =[
        'id','category_name','created_at','updated_at'
    ];

      public function Type_Fun_Relation()
    {
        return $this->hasMany('App\Models\TypeModel', 'category_id');
    }
}