@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>My Notifications</h2>
            
            <div class="mb-3">
                <a href="{{ route('notifications.mark-all-read') }}" method="POST" class="btn btn-sm btn-warning">
                    Mark All as Read
                </a>
                <a href="{{ route('notifications.destroy-all') }}" method="DELETE" class="btn btn-sm btn-danger">
                    Delete All
                </a>
            </div>

            @if ($notifications->count() > 0)
                <div class="list-group">
                    @foreach ($notifications as $notification)
                        <form action="{{ route('notifications.read', $notification) }}" method="POST" style="display: block; margin-bottom: 0;">
                            @csrf
                            <button type="submit" class="list-group-item list-group-item-action {{ !$notification->is_read ? 'active' : '' }}" style="width: 100%; text-align: left; border: none; background: none; padding: 12px 15px; cursor: pointer;">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $notification->title }}</h5>
                                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1">{{ $notification->description }}</p>
                                @if (!$notification->is_read)
                                    <small><span class="badge badge-primary">Unread</span></small>
                                @endif
                            </button>
                        </form>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $notifications->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    You have no notifications yet.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
