<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'howmanytravellers',
        'city',
        'arrival',
        'departure',
        'noofadults',
        'noofchildrens',
        'minprice',
        'maxprice',
    ];

    protected $casts = [
        'arrival' => 'date',
        'departure' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
