<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name','image',];


    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function tourBookings()
{
    return $this->hasMany(TourBooking::class);
}
}
