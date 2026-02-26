<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'pickup_location',
        'dropoff_location',
        'pickup_date',
        'pickup_time',
        'dropoff_date',
        'dropoff_time',
        'car_type',
        'total_passengers',
        'no_of_adults',
        'no_of_childrens',
        'min_price',
        'max_price',
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'dropoff_date' => 'date',
        'pickup_time' => 'datetime:H:i',
        'dropoff_time' => 'datetime:H:i',
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
