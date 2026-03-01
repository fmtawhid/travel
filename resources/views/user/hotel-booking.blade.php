@extends('layouts.user')
@section('user_dashboard')
    <!--CENTER SECTION-->
    <div class="db-2">
        <div class="db-2-com db-2-main">
            <h4>Hotel Booking</h4>
            <div class="db-2-main-com db-2-main-com-table">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hotel Name</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Rooms</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->hotel?->name ?? 'N/A' }}</td>
                                <td>{{ $booking->check_in ? \Carbon\Carbon::parse($booking->check_in)->format('d M Y') : 'N/A' }}</td>
                                <td>{{ $booking->check_out ? \Carbon\Carbon::parse($booking->check_out)->format('d M Y') : 'N/A' }}</td>
                                <td>{{ $booking->no_of_rooms }}</td>
                                <td><a href="{{ route('user.booking.hotel-details', $booking->id) }}" class="db-done">view more</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; color: #999; padding: 20px;">No hotel bookings found. <a href="{{ route('booking.hotel') }}">Browse hotels</a></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection