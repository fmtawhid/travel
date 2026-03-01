@extends('layouts.user')
@section('user_dashboard')
    <!--CENTER SECTION-->
    <div class="db-2">
        <div class="db-2-com db-2-main">
            <h4>Payment Requests</h4>
            <div class="db-2-main-com-table">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Request ID</th>
                            <th>Payment ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($paymentRequests as $request)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>#{{ $request->id }}</td>
                                <td>
                                    <a href="{{ route('user.payment.view', [strtolower($request->payment->getBookingType()), $request->payment->getBookingId()]) }}" style="color: #2196F3; text-decoration: none;">
                                        #{{ $request->payment_id }}
                                    </a>
                                </td>
                                <td style="font-weight: bold; color: #28a745;">${{ number_format($request->amount, 2) }}</td>
                                <td>
                                    @if($request->status == 'pending')
                                        <span class="badge" style="background-color: #ff9800; color: white; padding: 5px 10px; border-radius: 4px;">Pending</span>
                                    @elseif($request->status == 'requested')
                                        <span class="badge" style="background-color: #2196F3; color: white; padding: 5px 10px; border-radius: 4px;">Requested</span>
                                    @elseif($request->status == 'completed')
                                        <span class="badge" style="background-color: #4CAF50; color: white; padding: 5px 10px; border-radius: 4px;">Completed</span>
                                    @elseif($request->status == 'cancelled')
                                        <span class="badge" style="background-color: #9E9E9E; color: white; padding: 5px 10px; border-radius: 4px;">Cancelled</span>
                                    @endif
                                </td>
                                <td>{{ $request->created_at->format('d M Y, h:i A') }}</td>
                                <td>{{ $request->updated_at->format('d M Y, h:i A') }}</td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align: center; color: #999; padding: 20px;">
                                    No payment requests found. 
                                    <a href="{{ route('user.dashboard') }}" style="color: #2196F3;">View your bookings</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($paymentRequests->hasPages())
            <div style="margin-top: 20px; padding: 20px; text-align: center;">
                {{ $paymentRequests->links('pagination::bootstrap-4') }}
            </div>
            @endif
        </div>
    </div>
    
@endsection
