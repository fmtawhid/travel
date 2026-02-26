@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">

                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Payment Details #{{ $payment->id }}
                            <a href="{{ route('admin.payments.index') }}" class="btn-small waves-effect waves-light grey right">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </h4>
                    </div>

                    <!-- Payment Information -->
                    <div class="tab-inn">
                        <h5 style="margin-top: 20px; border-bottom: 2px solid #2196F3; padding-bottom: 10px;">
                            <i class="fa fa-credit-card"></i> Payment Information
                        </h5>
                        <div class="row">
                            <div class="col s6">
                                <p><strong>Payment ID:</strong> #{{ $payment->id }}</p>
                                <p><strong>Booking Type:</strong> 
                                    <span class="">{{ $payment->getBookingType() }}</span>
                                </p>
                                <p><strong>Amount:</strong> <strong style="font-size: 1.1em; color: #28a745;">${{ number_format($payment->amount, 2) }}</strong></p>
                            </div>

                            <div class="col s6">
                                <p><strong>Status:</strong><br>
                                    @if($payment->status == 'pending')
                                        <span class="text-warning">Pending</span>
                                    @elseif($payment->status == 'completed')
                                        <span class="text-success">Completed</span>
                                    @elseif($payment->status == 'failed')
                                        <span class="text-danger">Failed</span>
                                    @elseif($payment->status == 'cancelled')
                                        <span class="text-secondary">Cancelled</span>
                                    @endif
                                </p>
                                <p><strong>Created:</strong> {{ $payment->created_at->format('d M Y, h:i A') }}</p>
                                <p><strong>Last Updated:</strong> {{ $payment->updated_at->format('d M Y, h:i A') }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <p><strong>Description:</strong></p>
                                <p>{{ $payment->description ?? 'No description provided.' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- User Information -->
                    @php
                        $booking = $payment->getBooking();
                        $user = $booking ? $booking->user : null;
                    @endphp

                    @if($user)
                    <div class="tab-inn">
                        <h5 style="margin-top: 20px; border-bottom: 2px solid #FF9800; padding-bottom: 10px;">
                            <i class="fa fa-user"></i> Customer Information
                        </h5>
                        <div class="row">
                            <div class="col s6">
                                <p><strong>Customer Name:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</p>
                                <p><strong>Address:</strong> {{ $user->address ?? 'N/A' }}</p>
                            </div>

                            <div class="col s6">
                                <p><strong>City:</strong> {{ $user->city ?? 'N/A' }}</p>
                                <p><strong>Country:</strong> {{ $user->country ?? 'N/A' }}</p>
                                <p><strong>Postal Code:</strong> {{ $user->postal_code ?? 'N/A' }}</p>
                                <p><strong>User ID:</strong> #{{ $user->id }}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Booking Information -->
                    @if($booking)
                    <div class="tab-inn">
                        <h5 style="margin-top: 20px; border-bottom: 2px solid #4CAF50; padding-bottom: 10px;">
                            <i class="fa fa-calendar"></i> {{ $payment->getBookingType() }} Booking Details
                        </h5>
                        <div class="row">
                            <div class="col s6">
                                <p><strong>Booking ID:</strong> #{{ $payment->getBookingId() }}</p>
                                @if(isset($booking->name))
                                    <p><strong>Name:</strong> {{ $booking->name ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->email))
                                    <p><strong>Email:</strong> {{ $booking->email ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->phone))
                                    <p><strong>Phone:</strong> {{ $booking->phone ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->hotel_name))
                                    <p><strong>Hotel Name:</strong> {{ $booking->hotel_name ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->car_type))
                                    <p><strong>Car Type:</strong> {{ $booking->car_type ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->destination))
                                    <p><strong>Destination:</strong> {{ $booking->destination ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->from_city))
                                    <p><strong>From City:</strong> {{ $booking->from_city ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->to_city))
                                    <p><strong>To City:</strong> {{ $booking->to_city ?? 'N/A' }}</p>
                                @endif
                                <p><strong>Booking Date:</strong> {{ $booking->created_at->format('d M Y') ?? 'N/A' }}</p>
                            </div>

                            <div class="col s6">
                                @if(isset($booking->total_persons))
                                    <p><strong>Total Persons:</strong> {{ $booking->total_persons }}</p>
                                @elseif(isset($booking->no_of_persons))
                                    <p><strong>Total Persons:</strong> {{ $booking->no_of_persons }}</p>
                                @endif
                                @if(isset($booking->check_in_date))
                                    <p><strong>Check-in Date:</strong> {{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->check_out_date))
                                    <p><strong>Check-out Date:</strong> {{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->pickup_date))
                                    <p><strong>Pickup Date:</strong> {{ \Carbon\Carbon::parse($booking->pickup_date)->format('d M Y') ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->dropoff_date))
                                    <p><strong>Dropoff Date:</strong> {{ \Carbon\Carbon::parse($booking->dropoff_date)->format('d M Y') ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->departure_date))
                                    <p><strong>Departure Date:</strong> {{ \Carbon\Carbon::parse($booking->departure_date)->format('d M Y') ?? 'N/A' }}</p>
                                @endif
                                @if(isset($booking->return_date))
                                    <p><strong>Return Date:</strong> {{ \Carbon\Carbon::parse($booking->return_date)->format('d M Y') ?? 'N/A' }}</p>
                                @endif
                                <p><strong>Booking Amount:</strong> 
                                    @if(isset($booking->total_price))
                                        ${{ number_format($booking->total_price, 2) }}
                                    @elseif(isset($booking->price))
                                        ${{ number_format($booking->price, 2) }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                                <p><strong>Booking Status:</strong> 
                                    @if(isset($booking->status))
                                        <span class="">{{ ucfirst($booking->status) }}</span>
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                        </div>

                        @if(isset($booking->special_requests) || isset($booking->notes))
                        <div class="row">
                            <div class="col s12">
                                <p><strong>Special Requests / Notes:</strong></p>
                                <p>{{ $booking->special_requests ?? $booking->notes ?? 'None' }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    <hr>

                    <!-- Action Buttons -->
                    <div class="row">
                        <div class="col s12">
                            <a href="{{ route('admin.payments.edit', $payment->id) }}" 
                               class="waves-effect waves-light btn-small orange">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this payment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="waves-effect waves-light btn-small red">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                            <a href="{{ route('admin.payments.index') }}" class="waves-effect waves-light btn-small grey">
                                <i class="fa fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
