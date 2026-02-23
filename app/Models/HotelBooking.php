<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'hotel_id', 'room_type_id', 'name', 'phone', 'email',
        'check_in', 'check_out', 'no_of_rooms', 'no_of_adults', 'no_of_childrens',
        'min_price', 'max_price'
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
