@extends('layouts.user')
@section('user_dashboard')
    <!--CENTER SECTION-->
    <div class="db-2">
        <div class="db-2-com db-2-main">
            <h4>Flight Booking</h4>
            <div class="db-2-main-com db-2-main-com-table">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Arrival Date</th>
                            <th>Passengers</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->flying_from ?? 'N/A' }}</td>
                                <td>{{ $booking->flying_to ?? 'N/A' }}</td>
                                <td>{{ $booking->arrival_date ? \Carbon\Carbon::parse($booking->arrival_date)->format('d M Y') : 'N/A' }}</td>
                                <td>{{ ($booking->no_of_adults ?? 0) + ($booking->no_of_childrens ?? 0) }}</td>
                                
                                <td><a href="{{ route('user.booking.flight-details', $booking->id) }}" class="db-done">view more</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; color: #999; padding: 20px;">No flight bookings found. <a href="{{ route('booking.flight') }}">Browse flights</a></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
