<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = ['user_id', 'card_name', 'card_number', 'expiry_date', 'cvv', 'full_name', 'is_default'];

    protected $hidden = ['cvv', 'card_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
