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
        'description',
        'follow_text',
        'facebook',
        'instagram',
        'x',
        'linkedin',
        'youtube',
        'support_team_id',
        'feature_package_id'
    ];

    public function supportTeam()
    {
        return $this->belongsTo(Team::class, 'support_team_id');
    }

    public function featuredPackage()
    {
        return $this->belongsTo(Tour::class, 'feature_package_id');
    }
}
