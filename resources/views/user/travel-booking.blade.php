@extends('layouts.user')
@section('user_dashboard')

    <!--CENTER SECTION-->
    <div class="db-2">
        <div class="db-2-com db-2-main">
            <h4>Travel Booking</h4>
            <div class="db-2-main-com db-2-main-com-table">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Package</th>
                            <th>Duration</th>
                            <th>Start Date</th>
                            <th>Price</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->tour?->title ?? 'N/A' }}</td>
                                <td>{{ $booking->tour?->duration ?? 'N/A' }}</td>
                                <td>{{ $booking->tour?->start_date ? \Carbon\Carbon::parse($booking->tour->start_date)->format('d M Y') : 'N/A' }}</td>
                                <td>${{ $booking->tour?->discount_price ?? $booking->tour?->price ?? '0' }}</td>
                                <td><a href="{{ route('user.booking.tour-package-details', $booking->id) }}" class="db-done">view more</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; color: #999; padding: 20px;">No tour bookings found. <a href="{{ route('packages') }}">Browse packages</a></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
			 
@endsection