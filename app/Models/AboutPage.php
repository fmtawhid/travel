<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = ['title', 'subtitle', 'description', 'phone', 'services', 'image'];

    protected $casts = [
        'services' => 'array',
    ];
}

