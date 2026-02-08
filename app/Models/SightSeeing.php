<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SightSeeing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'short_description',
        'long_description',
    ];
}
