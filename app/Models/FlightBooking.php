<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'flying_from',
        'flying_to',
        'arrival_date',
        'departure_date',
        'no_of_adults',
        'no_of_childrens',
        'min_price',
        'max_price',
    ];

    protected $casts = [
        'arrival_date' => 'date',
        'departure_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
