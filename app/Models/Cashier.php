<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Cashier extends Authenticatable
{
    protected $table = 'cashier';

    protected $fillable = [
        'username',
        'firstname',
        'middlename',
        'lastname',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
} 