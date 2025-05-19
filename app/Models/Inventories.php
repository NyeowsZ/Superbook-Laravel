<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventories extends Model
{
    protected $table = 'inventories';

    protected $fillable = [
        'series_id',
        'stock',
        'reserved',
        'sold',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
