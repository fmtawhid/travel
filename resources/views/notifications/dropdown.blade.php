@if(auth()->check())
<div class="notification-widget">
    {{-- Notification count badge --}}
    <a href="{{ route('notifications.index') }}" class="notification-icon" id="notificationBell">
        <i class="fas fa-bell"></i>
        @php
            $unreadCount = \App\Models\Notification::forCurrentUser()->unread()->count();
        @endphp
        @if($unreadCount > 0)
            <span class="notification-badge">{{ $unreadCount }}</span>
        @endif
    </a>

    {{-- Notification dropdown --}}
    <div class="notification-dropdown" id="notificationDropdown" style="display: none; position: absolute; background: white; border: 1px solid #ddd; border-radius: 4px; min-width: 350px; max-height: 400px; overflow-y: auto; z-index: 1000; box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
        <div style="padding: 15px; border-bottom: 1px solid #f0f0f0;">
            <h6 style="margin: 0; font-weight: bold;">Notifications</h6>
        </div>

        @php
            $latestNotifications = \App\Models\Notification::forCurrentUser()
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
        @endphp

        @if($latestNotifications->count() > 0)
            <div style="max-height: 320px; overflow-y: auto;">
                @foreach($latestNotifications as $notif)
                    <form action="{{ route('notifications.read', $notif) }}" method="POST" style="display: block; border-bottom: 1px solid #f0f0f0;">
                        @csrf
                        <button type="submit" style="display: block; padding: 12px 15px; text-decoration: none; color: #333; border: none; background: white; width: 100%; text-align: left; cursor: pointer; transition: background 0.2s;" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='white'">
                            <div style="font-weight: {{ !$notif->is_read ? 'bold' : 'normal' }}; margin-bottom: 4px;">
                                {{ $notif->title }}
                            </div>
                            <div style="font-size: 12px; color: #666; margin-bottom: 4px;">
                                {{ \Illuminate\Support\Str::limit($notif->description, 60) }}
                            </div>
                            <div style="font-size: 11px; color: #999;">
                                {{ $notif->created_at->diffForHumans() }}
                            </div>
                            @if(!$notif->is_read)
                                <div style="display: inline-block; background: #007bff; color: white; padding: 2px 6px; border-radius: 3px; font-size: 10px; margin-top: 4px;">
                                    New
                                </div>
                            @endif
                        </button>
                    </form>
                @endforeach
            </div>
        @else
            <div style="padding: 15px; text-align: center; color: #999;">
                No notifications yet
            </div>
        @endif

        <div style="padding: 10px 15px; border-top: 1px solid #f0f0f0; text-align: center;">
            <a href="{{ route('notifications.index') }}" style="color: #007bff; text-decoration: none; font-size: 12px;">
                View All Notifications
            </a>
        </div>
    </div>
</div>

<style>
    .notification-widget {
        position: relative;
        display: inline-block;
    }

    .notification-icon {
        cursor: pointer;
        position: relative;
        font-size: 18px;
        text-decoration: none;
    }

    .notification-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #dc3545;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: bold;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bell = document.getElementById('notificationBell');
        const dropdown = document.getElementById('notificationDropdown');

        if (bell && dropdown) {
            bell.addEventListener('click', function(e) {
                e.preventDefault();
                dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
            });

            document.addEventListener('click', function(e) {
                if (!bell.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.style.display = 'none';
                }
            });
        }
    });
</script>
@endif
