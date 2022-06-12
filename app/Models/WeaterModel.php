<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeaterModel extends Model
{
    protected $table="weater_models";
    protected $primaryKey="id";
    protected $fillable =[
        'id',
        'weater_name',
        'created_at',
        'updated_at'
    ];
}