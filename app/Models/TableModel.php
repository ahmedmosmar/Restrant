<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableModel extends Model
{
     protected $table="table_models";
    protected $primaryKey="id";
    protected $fillable =[
        'id','table_name','created_at','updated_at'
    ];
}