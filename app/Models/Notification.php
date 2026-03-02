<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'url',
        'sender_role',
        'receiver_role',
        'user_id',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Get the user that owns the notification
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: Get unread notifications
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope: Get notifications for current user
     */
    public function scopeForCurrentUser($query)
    {
        return $query->where('user_id', auth()->id());
    }

    /**
     * Scope: Get notifications for admins
     */
    public function scopeForAdmins($query)
    {
        return $query->where('receiver_role', 'admin')->whereNull('user_id');
    }

    /**
     * Scope: Get notifications for users
     */
    public function scopeForUsers($query)
    {
        return $query->where('receiver_role', 'user');
    }

    /**
     * Mark notification as read
     */
    public function markAsRead()
    {
        $this->update(['is_read' => true]);
        return $this;
    }
}
