<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id', 'room_type', 'price', 'description', 'images', 'amenities'
    ];
 
    protected $casts = [
        'images' => 'array',
        'amenities' => 'array',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}

