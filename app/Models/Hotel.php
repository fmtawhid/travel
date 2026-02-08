<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'contact_person', 'description', 'gallery_images',
        'facebook_url', 'google_plus_url', 'twitter_url', 'linkedin_url', 'vk_url',
        'whatsapp_number', 'contact_name', 'alter_contact_name', 'phone', 'mobile', 'email',
        'image', 'location', 'amenities'
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'amenities' => 'array',
    ];

    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }
}

