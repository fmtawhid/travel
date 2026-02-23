<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'tour_id',
        'name',
        'phone',
        'email',
        'city',
        'arrival',
        'departure',
        'noofadults',
        'noofchildrens',
    ];

    protected $casts = [
        'arrival' => 'date',
        'departure' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
