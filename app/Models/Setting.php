<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    

    protected $fillable = [
        'name',
        'logo',
        'favicon',
        'phone',
        'email',
        'location',
        'facebook',
        'instagram',
        'x',
        'linkedin',
        'youtube'
    ];
}
