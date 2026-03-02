<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;

class NotificationService
{
    /**
     * Create notification for all admins
     * 
     * @param string $title
     * @param string $description
     * @param string $url
     * @param string|null $image
     * @return void
     */
    public static function notifyAdmins($title, $description, $url = null, $image = null)
    {
        // Get all admin users
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            Notification::create([
                'title' => $title,
                'description' => $description,
                'url' => $url,
                'image' => $image,
                'sender_role' => 'user',
                'receiver_role' => 'admin',
                'user_id' => $admin->id,
                'is_read' => false,
            ]);
        }
    }

    /**
     * Create notification for all users
     * 
     * @param string $title
     * @param string $description
     * @param string $url
     * @param string|null $image
     * @return void
     */
    public static function notifyAllUsers($title, $description, $url = null, $image = null)
    {
        // Get all regular users
        $users = User::where('role', 'user')->get();

        foreach ($users as $user) {
            Notification::create([
                'title' => $title,
                'description' => $description,
                'url' => $url,
                'image' => $image,
                'sender_role' => 'admin',
                'receiver_role' => 'user',
                'user_id' => $user->id,
                'is_read' => false,
            ]);
        }
    }

    /**
     * Create notification for a specific user
     * 
     * @param User $user
     * @param string $title
     * @param string $description
     * @param string $url
     * @param string|null $image
     * @param string $senderRole
     * @return Notification
     */
    public static function notifyUser($user, $title, $description, $url = null, $image = null, $senderRole = 'admin')
    {
        return Notification::create([
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'image' => $image,
            'sender_role' => $senderRole,
            'receiver_role' => 'user',
            'user_id' => $user->id,
            'is_read' => false,
        ]);
    }

    /**
     * Create notification for a specific admin
     * 
     * @param User $admin
     * @param string $title
     * @param string $description
     * @param string $url
     * @param string|null $image
     * @return Notification
     */
    public static function notifyAdmin($admin, $title, $description, $url = null, $image = null)
    {
        return Notification::create([
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'image' => $image,
            'sender_role' => 'user',
            'receiver_role' => 'admin',
            'user_id' => $admin->id,
            'is_read' => false,
        ]);
    }

    /**
     * Get unread notification count for current user
     * 
     * @return int
     */
    public static function getUnreadCount()
    {
        return Notification::forCurrentUser()->unread()->count();
    }

    /**
     * Get latest notifications for current user
     * 
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLatestNotifications($limit = 5)
    {
        return Notification::forCurrentUser()
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }
}
