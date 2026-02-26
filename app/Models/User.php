<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'phone',
        'city',
        'country',
        'password',
        'role',
        'image',
        'date_of_birth',
        'status',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
        ];
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function tourBookings()
    {
        return $this->hasMany(TourBooking::class);
    }

    public function hotelBookings()
    {
        return $this->hasMany(HotelBooking::class);
    }

    public function carBookings()
    {
        return $this->hasMany(CarBooking::class);
    }

    public function flightBookings()
    {
        return $this->hasMany(FlightBooking::class);
    }

    public function eventBookings()
    {
        return $this->hasMany(EventBooking::class);
    }

    public function customBookings()
    {
        return $this->hasMany(CustomBooking::class);
    }

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

}
