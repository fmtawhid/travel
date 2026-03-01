@extends('layouts.user')
@section('user_dashboard')
    <!--CENTER SECTION-->
    <div class="db-2">
        <div class="db-2-com db-2-main">
            <h4>My Payments</h4>
            <div class="db-2-main-com-table">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Payment ID</th>
                            <th>Booking Type</th>
                            <th>Booking Reference</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $payment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>#{{ $payment->id }}</td>
                                <td>
                                    <span class="badge" style="background-color: #2196F3; color: white; padding: 5px 10px; border-radius: 4px;">
                                        {{ $payment->getBookingType() }}
                                    </span>
                                </td>
                                <td>
                                    @if($payment->tour_booking_id)
                                        Tour #{{ $payment->tour_booking_id }}
                                    @elseif($payment->hotel_booking_id)
                                        Hotel #{{ $payment->hotel_booking_id }}
                                    @elseif($payment->car_booking_id)
                                        Car #{{ $payment->car_booking_id }}
                                    @elseif($payment->flight_booking_id)
                                        Flight #{{ $payment->flight_booking_id }}
                                    @elseif($payment->custom_booking_id)
                                        Custom #{{ $payment->custom_booking_id }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td style="font-weight: bold; color: #28a745;">${{ number_format($payment->amount, 2) }}</td>
                                <td>
                                    @if($payment->status == 'pending')
                                        <span class="badge" style="background-color: #ff9800; color: white; padding: 5px 10px; border-radius: 4px;">Pending</span>
                                    @elseif($payment->status == 'completed')
                                        <span class="badge" style="background-color: #4CAF50; color: white; padding: 5px 10px; border-radius: 4px;">Completed</span>
                                    @elseif($payment->status == 'failed')
                                        <span class="badge" style="background-color: #f44336; color: white; padding: 5px 10px; border-radius: 4px;">Failed</span>
                                    @elseif($payment->status == 'cancelled')
                                        <span class="badge" style="background-color: #9E9E9E; color: white; padding: 5px 10px; border-radius: 4px;">Cancelled</span>
                                    @endif
                                </td>
                                <td>{{ $payment->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('user.payment.view', [strtolower($payment->getBookingType()), $payment->getBookingId()]) }}" class="db-done" style="color: #2196F3; text-decoration: none; font-weight: bold;">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align: center; color: #999; padding: 20px;">
                                    No payments found. 
                                    <a href="{{ route('user.dashboard') }}" style="color: #2196F3;">View your bookings</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($payments->hasPages())
            <div style="margin-top: 20px; padding: 20px; text-align: center;">
                {{ $payments->links('pagination::bootstrap-4') }}
            </div>
            @endif
        </div>
    </div>
    
@endsection
