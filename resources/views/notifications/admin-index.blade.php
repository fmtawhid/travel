@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4><i class="fa fa-bell"></i> Notifications Management</h4>
                    </div>
                    <div class="inn-content">
                        <p>View and manage all notifications for users in the system.</p>
                    </div>

                    <!-- Stats Section -->
                    <div style="padding: 0 20px; margin-bottom: 20px;">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 15px;">
                                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 4px; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                    <div style="font-size: 28px; font-weight: bold; margin-bottom: 8px;">{{ $totalNotifications }}</div>
                                    <div style="font-size: 12px;">Total Notifications</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 15px;">
                                <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 20px; border-radius: 4px; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                    <div style="font-size: 28px; font-weight: bold; margin-bottom: 8px;">{{ $unreadNotifications }}</div>
                                    <div style="font-size: 12px;">Unread Notifications</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Section -->
                    <div style="padding: 20px; background: #f9f9f9; margin-bottom: 20px; border-radius: 4px;">
                        <form method="GET" action="{{ route('notifications.index') }}" style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap; margin-bottom: 10px;">
                            <select name="filter" style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px;">
                                <option value="">All Notifications</option>
                                <option value="unread" {{ request('filter') === 'unread' ? 'selected' : '' }}>Unread Only</option>
                                <option value="read" {{ request('filter') === 'read' ? 'selected' : '' }}>Read Only</option>
                            </select>
                            <button type="submit" style="padding: 8px 16px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;"><i class="fa fa-filter"></i> Filter</button>
                        </form>
                        @if($unreadNotifications > 0)
                            <form method="POST" action="{{ route('notifications.mark-all-read') }}" style="display: inline;">
                                @csrf
                                <button type="submit" style="padding: 8px 16px; background: #ffc107; color: #333; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;" onclick="return confirm('Mark all as read?')"><i class="fa fa-check"></i> Mark All Read</button>
                            </form>
                        @endif
                    </div>

                    <!-- Notifications Table -->
                    @if($notifications->count() > 0)
                        <div class="tab-inn">
                            <table class="bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 25%;">Title</th>
                                        <th style="width: 35%;">Description</th>
                                        <th style="width: 12%;">From</th>
                                        <th style="width: 10%;">Time</th>
                                        <th style="width: 8%;">Status</th>
                                        <th style="width: 15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notifications as $notif)
                                        <tr style="background-color: {{ !$notif->is_read ? '#fffbea' : 'white' }};">
                                            <td>{{ ($notifications->currentPage() - 1) * $notifications->perPage() + $loop->iteration }}</td>
                                            <td><strong>{{ $notif->title }}</strong></td>
                                            <td>{{ \Illuminate\Support\Str::limit($notif->description, 50) }}</td>
                                            <td>{{ ucfirst($notif->sender_role) }}</td>
                                            <td><small>{{ $notif->created_at->diffForHumans() }}</small></td>
                                            <td>
                                                @if(!$notif->is_read)
                                                    <span style="background: #dc3545; color: white; padding: 4px 8px; border-radius: 3px; font-size: 11px; font-weight: bold;">New</span>
                                                @else
                                                    <span style="color: #999; font-size: 11px;">Read</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                                                    @if(!$notif->is_read)
                                                        <form action="{{ route('notifications.read', $notif) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" style="padding: 5px 10px; background: #28a745; color: white; border: none; border-radius: 3px; cursor: pointer; font-size: 11px;"><i class="fa fa-check"></i> Read</button>
                                                        </form>
                                                    @endif
                                                    <form action="{{ route('notifications.destroy', $notif) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="padding: 5px 10px; background: #dc3545; color: white; border: none; border-radius: 3px; cursor: pointer; font-size: 11px;" onclick="return confirm('Delete this notification?')"><i class="fa fa-trash"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($notifications->hasPages())
                            <div style="padding: 15px 20px; background: #f9f9f9; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; border-top: 1px solid #ddd;">
                                <div style="font-size: 13px; color: #666;">
                                    Showing {{ $notifications->firstItem() }} to {{ $notifications->lastItem() }} of {{ $notifications->total() }} notifications
                                </div>
                                <div>
                                    {{ $notifications->links() }}
                                </div>
                            </div>
                        @endif
                    @else
                        <div style="text-align: center; padding: 60px 20px; color: #999;">
                            <i class="fa fa-inbox" style="font-size: 48px; margin-bottom: 15px; color: #ddd; display: block;"></i>
                            <h4 style="color: #666; margin: 15px 0;">No Notifications</h4>
                            <p>You don't have any notifications yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

        