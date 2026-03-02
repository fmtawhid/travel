@if(auth()->check())
@php
    $unreadCount = \App\Models\Notification::forCurrentUser()->unread()->count();
    $latestNotifications = \App\Models\Notification::forCurrentUser()
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
@endphp

<style>
    .admin-notification-dropdown {
        position: absolute;
        top: 50px;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        border-radius: 2px;
        min-width: 380px;
        max-height: 450px;
        overflow-y: auto;
        z-index: 1000;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        display: none;
    }

    .admin-notification-dropdown.show {
        display: block;
    }

    .notification-header {
        padding: 12px 15px;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f9f9f9;
    }

    .notification-header h6 {
        margin: 0;
        font-weight: 600;
        color: #333;
        font-size: 14px;
    }

    .notification-item {
        padding: 12px 15px;
        border-bottom: 1px solid #f0f0f0;
        cursor: pointer;
        transition: background 0.2s;
        display: block;
        text-decoration: none;
        color: #333;
    }

    .notification-item:hover {
        background: #f5f5f5;
    }

    .notification-item.unread {
        background: #f0f7ff;
        border-left: 3px solid #2196F3;
    }

    .notification-title {
        font-weight: 600;
        color: #333;
        font-size: 13px;
        margin-bottom: 4px;
    }

    .notification-description {
        font-size: 12px;
        color: #666;
        margin-bottom: 4px;
        line-height: 1.4;
    }

    .notification-time {
        font-size: 11px;
        color: #999;
    }

    .notification-badge {
        display: inline-block;
        background: #2196F3;
        color: white;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 10px;
        margin-top: 4px;
    }

    .notification-footer {
        padding: 10px 15px;
        border-top: 1px solid #f0f0f0;
        text-align: center;
        background: #f9f9f9;
    }

    .notification-footer a {
        color: #2196F3;
        text-decoration: none;
        font-size: 12px;
        font-weight: 500;
    }

    .notification-footer a:hover {
        text-decoration: underline;
    }

    .notification-empty {
        padding: 20px 15px;
        text-align: center;
        color: #999;
        font-size: 12px;
    }

    .btn-noti span {
        position: absolute;
        top: -5px;
        right: -8px;
        background: #f44336;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: bold;
    }

    .btn-noti {
        position: relative;
    }
</style>

<a class='waves-effect btn-noti' href='javascript:void(0)' onclick="toggleNotificationDropdown(event)">
    <i class="fa fa-envelope-o" aria-hidden="true"></i>
    @if($unreadCount > 0)
        <span>{{ $unreadCount }}</span>
    @else
        <span style="display: none;">0</span>
    @endif
</a>

<div class="admin-notification-dropdown" id="adminNotificationDropdown">
    <div class="notification-header">
        <h6>🔔 Notifications</h6>
        @if($unreadCount > 0)
            <a href="{{ route('notifications.mark-all-read') }}" style="font-size: 12px; color: #2196F3; text-decoration: none;">Mark all read</a>
        @endif
    </div>

    @if($latestNotifications->count() > 0)
        <div>
            @foreach($latestNotifications as $notif)
                <form action="{{ route('notifications.read', $notif) }}" method="POST" style="display: block;">
                    @csrf
                    <button type="submit" class="notification-item {{ !$notif->is_read ? 'unread' : '' }}" style="width: 100%; text-align: left; background: none; border: none; padding: 12px 15px; cursor: pointer;">
                        <div class="notification-title">{{ $notif->title }}</div>
                        <div class="notification-description">{{ \Illuminate\Support\Str::limit($notif->description, 65) }}</div>
                        <div class="notification-time">{{ $notif->created_at->diffForHumans() }}</div>
                        @if(!$notif->is_read)
                            <div class="notification-badge">New</div>
                        @endif
                    </button>
                </form>
            @endforeach
        </div>
    @else
        <div class="notification-empty">
            📭 No notifications yet
        </div>
    @endif

    <div class="notification-footer">
        <a href="{{ route('notifications.index') }}">View All Notifications →</a>
    </div>
</div>

<script>
    function toggleNotificationDropdown(event) {
        event.preventDefault();
        const dropdown = document.getElementById('adminNotificationDropdown');
        dropdown.classList.toggle('show');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('adminNotificationDropdown');
        const btn = event.target.closest('.btn-noti');
        
        if (!btn && !dropdown.contains(event.target)) {
            dropdown.classList.remove('show');
        }
    });
</script>
@endif
