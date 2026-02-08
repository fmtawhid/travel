<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'short_description', 'long_description', 'location',
        'price', 'discount_percentage', 'discount_price', 'duration', 'package_id', 
        'image', 'rating', 'start_date', 'end_date',
        'include_sightseeing', 'include_hotel', 'include_transfer', 'include_luggage'
    ];

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
