@extends('layouts.user')

@section('user_dashboard')
<div class="db-2" style="flex: 1; padding: 20px;">
    <h2 style="margin-bottom: 20px; color: #333;"><i class="fa fa-bell"></i> My Notifications</h2>

    <!-- Stats -->
    <div style="display: flex; gap: 20px; margin-bottom: 20px; flex-wrap: wrap;">
        <div style="background: white; padding: 20px; border-radius: 8px; flex: 1; min-width: 150px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <div style="font-size: 24px; font-weight: bold; color: #2196F3;">{{ $totalNotifications }}</div>
            <div style="font-size: 12px; color: #999; margin-top: 5px;">Total</div>
        </div>
        <div style="background: white; padding: 20px; border-radius: 8px; flex: 1; min-width: 150px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <div style="font-size: 24px; font-weight: bold; color: #FF9800;">{{ $unreadNotifications }}</div>
            <div style="font-size: 12px; color: #999; margin-top: 5px;">Unread</div>
        </div>
    </div>

    <!-- Filter Section -->
    <div style="background: white; padding: 15px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <form method="GET" action="{{ route('notifications.index') }}" style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
            <select name="filter" style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px;">
                <option value="">All Notifications</option>
                <option value="unread" {{ request('filter') === 'unread' ? 'selected' : '' }}>Unread Only</option>
                <option value="read" {{ request('filter') === 'read' ? 'selected' : '' }}>Read Only</option>
            </select>
            <button type="submit" style="background: #2196F3; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;"><i class="fa fa-filter"></i> Filter</button>
            @if($unreadNotifications > 0)
                <form method="POST" action="{{ route('notifications.mark-all-read') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: #FF9800; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;" onclick="return confirm('Mark all as read?')"><i class="fa fa-check"></i> Mark All Read</button>
                </form>
            @endif
        </form>
    </div>

    <!-- Notifications List -->
    @if($notifications->count() > 0)
        <div style="background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); overflow: hidden;">
            @foreach($notifications as $notif)
                <div style="padding: 15px; border-bottom: 1px solid #f0f0f0; {{ !$notif->is_read ? 'background: #f0f7ff; border-left: 3px solid #2196F3;' : '' }}" onmouseover="this.style.background='{{ !$notif->is_read ? '#f0f7ff' : '#f9f9f9' }}'" onmouseout="this.style.background='{{ !$notif->is_read ? '#f0f7ff' : '#ffffff' }}'">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 10px;">
                        <div style="flex: 1;">
                            <div style="font-weight: 600; color: #333; margin-bottom: 6px;">
                                {{ $notif->title }}
                                @if(!$notif->is_read)
                                    <span style="background: #2196F3; color: white; padding: 2px 6px; border-radius: 3px; font-size: 11px; margin-left: 8px;">New</span>
                                @endif
                            </div>
                            <div style="font-size: 13px; color: #666; margin-bottom: 6px;}">{{ \Illuminate\Support\Str::limit($notif->description, 100) }}</div>
                            <div style="font-size: 11px; color: #999;">{{ $notif->created_at->diffForHumans() }}</div>
                        </div>
                        <div style="display: flex; gap: 6px; margin-top: 5px;">
                            @if(!$notif->is_read)
                                <form action="{{ route('notifications.read', $notif) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" style="background: #4CAF50; color: white; padding: 6px 12px; border-radius: 4px; border: none; font-size: 12px; cursor: pointer;" title="Mark as read"><i class="fa fa-check"></i> Read</button>
                                </form>
                            @endif
                            <form action="{{ route('notifications.destroy', $notif) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #f44336; color: white; padding: 6px 12px; border-radius: 4px; border: none; font-size: 12px; cursor: pointer;" onclick="return confirm('Delete this notification?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($notifications->hasPages())
            <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                <div style="color: #666; font-size: 13px;">
                    Showing {{ $notifications->firstItem() }} to {{ $notifications->lastItem() }} of {{ $notifications->total() }} notifications
                </div>
                <div>
                    {{ $notifications->links() }}
                </div>
            </div>
        @endif
    @else
        <div style="text-align: center; padding: 40px 20px; color: #999; background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <i class="fa fa-inbox" style="font-size: 48px; margin-bottom: 15px; opacity: 0.5; display: block;"></i>
            <h4 style="margin: 15px 0; color: #666;">No Notifications</h4>
            <p style="margin: 0;">You don't have any notifications yet. Check back soon!</p>
        </div>
    @endif
</div>
@endsection
