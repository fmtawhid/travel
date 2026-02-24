@extends('layouts.user')
@section('user_dashboard')

    <!--CENTER SECTION-->
    <div class="db-2">
        <div class="db-2-com db-2-main">
            <h4>Event Booking</h4>
            <div class="db-2-main-com db-2-main-com-table">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Event Name</th>
                            <th>Event Date</th>
                            <th>Payment</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->event?->name ?? 'N/A' }}</td>
                                <td>{{ $booking->event?->date ? \Carbon\Carbon::parse($booking->event->date)->format('d M Y') : 'N/A' }}</td>
                                <td><span class="db-done">Pending</span></td>
                                <td><a href="{{ route('user.booking.event-details', $booking->id) }}" class="db-done">view more</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: #999; padding: 20px;">No event bookings found. <a href="{{ route('events') }}">Browse events</a></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
                            