<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'email',
        'location',
        'whatsapp_number',
    ];
}
