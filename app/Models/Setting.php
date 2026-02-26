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
        'youtube',
        'support_team_id'
    ];

    public function supportTeam()
    {
        return $this->belongsTo(Team::class, 'support_team_id');
    }
}
