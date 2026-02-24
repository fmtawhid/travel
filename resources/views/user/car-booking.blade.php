@extends('layouts.user')
@section('user_dashboard')
    <!--CENTER SECTION-->
    <div class="db-2">
        <div class="db-2-com db-2-main">
            <h4>Car Rental Booking</h4>
            <div class="db-2-main-com db-2-main-com-table">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Car Type</th>
                            <th>Pickup Date</th>
                            <th>Dropoff Date</th>
                            <th>Passengers</th>
                            <th>Payment</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->car_type ?? 'N/A' }}</td>
                                <td>{{ $booking->pickup_date ? \Carbon\Carbon::parse($booking->pickup_date)->format('d M Y') : 'N/A' }}</td>
                                <td>{{ $booking->dropoff_date ? \Carbon\Carbon::parse($booking->dropoff_date)->format('d M Y') : 'N/A' }}</td>
                                <td>{{ $booking->total_passengers }}</td>
                                <td><span class="db-done">Pending</span></td>
                                <td><a href="{{ route('user.booking.car-details', $booking->id) }}" class="db-done">view more</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; color: #999; padding: 20px;">No car bookings found. <a href="{{ route('booking.car') }}">Browse cars</a></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
