<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subtitles extends Model
{
    protected $table = 'subtitles';

    protected $fillable = [
        'book_id',
        'subtitle',
        'cover_image',
        'description'
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
