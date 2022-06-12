<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'phone','password','full_name','level','created_at',
    ];


    protected $hidden = [
         'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}