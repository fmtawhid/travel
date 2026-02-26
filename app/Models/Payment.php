<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_booking_id',
        'hotel_booking_id',
        'car_booking_id',
        'flight_booking_id',
        'custom_booking_id',
        'amount',
        'status',
        'description',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function tourBooking()
    {
        return $this->belongsTo(TourBooking::class);
    }

    public function hotelBooking()
    {
        return $this->belongsTo(HotelBooking::class);
    }

    public function carBooking()
    {
        return $this->belongsTo(CarBooking::class);
    }

    public function flightBooking()
    {
        return $this->belongsTo(FlightBooking::class);
    }

    public function customBooking()
    {
        return $this->belongsTo(CustomBooking::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get the associated booking (whichever type it is)
     */
    public function getBooking()
    {
        if ($this->tour_booking_id) {
            return $this->tourBooking;
        } elseif ($this->hotel_booking_id) {
            return $this->hotelBooking;
        } elseif ($this->car_booking_id) {
            return $this->carBooking;
        } elseif ($this->flight_booking_id) {
            return $this->flightBooking;
        } elseif ($this->custom_booking_id) {
            return $this->customBooking;
        }
        return null;
    }

    /**
     * Get booking type as string
     */
    public function getBookingType()
    {
        if ($this->tour_booking_id) {
            return 'Tour Package';
        } elseif ($this->hotel_booking_id) {
            return 'Hotel';
        } elseif ($this->car_booking_id) {
            return 'Car';
        } elseif ($this->flight_booking_id) {
            return 'Flight';
        } elseif ($this->custom_booking_id) {
            return 'Custom';
        }
        return 'Unknown';
    }

    /**
     * Get booking ID based on type
     */
    public function getBookingId()
    {
        return $this->tour_booking_id ?? $this->hotel_booking_id ?? $this->car_booking_id ?? $this->flight_booking_id ?? $this->custom_booking_id;
    }
}
