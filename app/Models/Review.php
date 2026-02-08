<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'user_id', 'user_name', 'email', 'comment', 'rating', 'message'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
