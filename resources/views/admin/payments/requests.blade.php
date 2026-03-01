@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Payment Requests
                            <a href="{{ route('admin.payments.index') }}" class="btn-small waves-effect waves-light grey right">
                                <i class="fa fa-arrow-left"></i> Back to Payments
                            </a>
                        </h4>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                    <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px; border-left: 5px solid #28a745;">
                        <i class="fa fa-check-circle"></i> {{ session('success') }}
                    </div>
                    @endif

                    <!-- Error Message -->
                    @if(session('error'))
                    <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 4px; margin-bottom: 20px; border-left: 5px solid #f44336;">
                        <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                    @endif

                    <!-- Payment Requests Table -->
                    <div class="tab-inn">
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Request ID</th>
                                    <th>User</th>
                                    <th>Payment ID</th>
                                    <th>Booking Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($paymentRequests as $request)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>#{{ $request->id }}</strong></td>
                                        <td>
                                            <strong>{{ $request->user->name ?? 'N/A' }}</strong>
                                            <br>
                                            <small style="color: #666;">{{ $request->user->email ?? 'N/A' }}</small>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.payments.show', $request->payment_id) }}" style="color: #2196F3; text-decoration: none;">
                                                #{{ $request->payment_id }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge" style="background-color: #2196F3; color: white; padding: 0px 10px; border-radius: 4px;">
                                                {{ $request->payment->getBookingType() }}
                                            </span>
                                        </td>
                                        <td style="font-weight: bold; color: #28a745;">${{ number_format($request->amount, 2) }}</td>
                                        <td>
                                            @if($request->status == 'pending')
                                                <span class="badge" style="background-color: #ff9800; color: white; padding: 0px 10px; border-radius: 4px;">Pending</span>
                                            @elseif($request->status == 'requested')
                                                <span class="badge" style="background-color: #2196F3; color: white; padding: 0px 10px; border-radius: 4px;">Requested</span>
                                            @elseif($request->status == 'completed')
                                                <span class="badge" style="background-color: #4CAF50; color: white; padding: 0px 10px; border-radius: 4px;">Completed</span>
                                            @elseif($request->status == 'cancelled')
                                                <span class="badge" style="background-color: #9E9E9E; color: white; padding: 0px 10px; border-radius: 4px;">Cancelled</span>
                                            @endif
                                        </td>
                                        <td>{{ $request->created_at->format('d M Y, h:i A') }}</td>
                                        <td>
                                            @if($request->status !== 'completed')
                                                <form action="{{ route('admin.payments.confirm', $request->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to confirm this payment request?');">
                                                    @csrf
                                                    <button type="submit" class="waves-effect waves-light btn-small green">
                                                        <i class="fa fa-check"></i> Confirm
                                                    </button>
                                                </form>
                                            @else
                                                <span style="color: #999; font-size: 12px;">Confirmed</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" style="text-align: center; color: #999; padding: 30px;">
                                            <i class="fa fa-inbox" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
                                            No payment requests found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($paymentRequests->hasPages())
                    <div style="margin-top: 20px; display: flex; justify-content: center;">
                        {{ $paymentRequests->links('pagination::bootstrap-4') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
