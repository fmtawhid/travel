<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'date',
        'time',
        'location',
        'image',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
}
