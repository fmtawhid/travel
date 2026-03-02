<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Get all notifications for current user
     */
    public function index()
    {
        $user = auth()->user();
        $query = Notification::forCurrentUser();

        // Apply filter
        if (request('filter') === 'unread') {
            $query->unread();
        } elseif (request('filter') === 'read') {
            $query->where('is_read', true);
        }

        $notifications = $query->orderBy('created_at', 'desc')->paginate(15);
        
        $totalNotifications = Notification::forCurrentUser()->count();
        $unreadNotifications = Notification::forCurrentUser()->unread()->count();

        // Return different view based on user role
        if ($user->role === 'admin') {
            return view('notifications.admin-index', compact('notifications', 'totalNotifications', 'unreadNotifications'));
        } else {
            return view('notifications.user-index', compact('notifications', 'totalNotifications', 'unreadNotifications'));
        }
    }

    /**
     * Get latest 5 notifications (for navbar dropdown)
     */
    public function getLatest()
    {
        $notifications = Notification::forCurrentUser()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $unreadCount = Notification::forCurrentUser()->unread()->count();

        return response()->json([
            'notifications' => $notifications,
            'unreadCount' => $unreadCount,
        ]);
    }

    /**
     * Get unread notification count
     */
    public function getUnreadCount()
    {
        $count = Notification::forCurrentUser()->unread()->count();
        return response()->json(['count' => $count]);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead(Notification $notification)
    {
        // Verify the notification belongs to the current user
        if ($notification->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification->markAsRead();

        // Redirect to the notification URL if it exists
        if ($notification->url) {
            return redirect($notification->url)
                ->with('success', 'Notification marked as read');
        }

        return redirect()->back()
            ->with('success', 'Notification marked as read');
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        Notification::forCurrentUser()
            ->unread()
            ->update(['is_read' => true]);

        return response()->json(['success' => 'All notifications marked as read']);
    }

    /**
     * Delete a notification
     */
    public function destroy(Notification $notification)
    {
        // Verify the notification belongs to the current user
        if ($notification->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification->delete();

        return response()->json(['success' => 'Notification deleted']);
    }

    /**
     * Delete all notifications
     */
    public function destroyAll()
    {
        Notification::forCurrentUser()->delete();

        return response()->json(['success' => 'All notifications deleted']);
    }
}
