<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetModel extends Model
{
    protected $table="reset_models";
    protected $primaryKey="id";
    protected $fillable =[
        'id','final_price','table_number','weater_id','created_at','updated_at'
    ];
}