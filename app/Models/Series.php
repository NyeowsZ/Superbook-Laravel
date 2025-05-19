<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';

    protected $fillable = [
        'book_id',
        'subtitle_id',

        'series',
        'isbn',
        
        'cover_image',
        'description',
        

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

}
