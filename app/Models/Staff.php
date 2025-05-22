<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Staff extends Authenticatable
{
    protected $table = 'staff';

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
