@extends('layouts.user')
@section('user_dashboard')

	<!--CENTER SECTION-->
	<div class="db-2">
		<div class="db-2-com db-2-main">
			<h4>Payment Details #{{ $payment->id }}</h4>
			<div class="db-2-main-com db-2-main-com-table">

				<!-- Payment Information -->
				<div style="margin-bottom: 30px;">
					<h5 style="border-bottom: 2px solid #2196F3; padding-bottom: 10px; margin-bottom: 15px;">
						<i class="fa fa-credit-card"></i> Payment Information
					</h5>
					<table class="responsive-table">
						<tbody>
							<tr>
								<td><strong>Payment ID</strong></td>
								<td>:</td>
								<td>#{{ $payment->id }}</td>
							</tr>
							<tr>
								<td><strong>Booking Type</strong></td>
								<td>:</td>
								<td>
									<span style="background-color: #2196F3; color: white; padding: 5px 10px; border-radius: 4px;">
										{{ $payment->getBookingType() }}
									</span>
								</td>
							</tr>
							<tr>
								<td><strong>Amount</strong></td>
								<td>:</td>
								<td style="font-weight: bold; color: #28a745; font-size: 1.1em;">${{ number_format($payment->amount, 2) }}</td>
							</tr>
							<tr>
								<td><strong>Status</strong></td>
								<td>:</td>
								<td>
									@if($payment->status == 'pending')
										<span style="background-color: #ff9800; color: white; padding: 5px 10px; border-radius: 4px;">Pending</span>
									@elseif($payment->status == 'completed')
										<span style="background-color: #4CAF50; color: white; padding: 5px 10px; border-radius: 4px;">Completed</span>
									@elseif($payment->status == 'failed')
										<span style="background-color: #f44336; color: white; padding: 5px 10px; border-radius: 4px;">Failed</span>
									@elseif($payment->status == 'cancelled')
										<span style="background-color: #9E9E9E; color: white; padding: 5px 10px; border-radius: 4px;">Cancelled</span>
									@endif
								</td>
							</tr>
							<tr>
								<td><strong>Created Date</strong></td>
								<td>:</td>
								<td>{{ $payment->created_at->format('d M Y, h:i A') }}</td>
							</tr>
							<tr style="background-color: #f8f9fa;">
								<td><strong>Last Updated</strong></td>
								<td>:</td>
								<td>{{ $payment->updated_at->format('d M Y, h:i A') }}</td>
							</tr>
						</tbody>
					</table>

					@if($payment->description)
					<table class="responsive-table" style="margin-top: 15px;">
						<tbody>
							<tr>
								<td><strong>Description</strong></td>
								<td>:</td>
								<td>{{ $payment->description }}</td>
							</tr>
						</tbody>
					</table>
					@endif
				</div>

				<!-- Booking Information -->
				@php
					$booking = $payment->getBooking();
					$user = $booking ? $booking->user : null;
				@endphp

				@if($booking)
				<div style="margin-bottom: 30px;">
					<h5 style="border-bottom: 2px solid #4CAF50; padding-bottom: 10px; margin-bottom: 15px;">
						<i class="fa fa-calendar"></i> {{ $payment->getBookingType() }} Booking Details
					</h5>
					<table class="responsive-table">
						<tbody>
							<tr>
								<td><strong>Booking ID</strong></td>
								<td>:</td>
								<td>#{{ $payment->getBookingId() }}</td>
							</tr>
							@if(isset($booking->name))
								<tr>
									<td><strong>Name</strong></td>
									<td>:</td>
									<td>{{ $booking->name ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->email))
								<tr>
									<td><strong>Email</strong></td>
									<td>:</td>
									<td>{{ $booking->email ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->phone))
								<tr>
									<td><strong>Phone</strong></td>
									<td>:</td>
									<td>{{ $booking->phone ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->hotel_name))
								<tr>
									<td><strong>Hotel Name</strong></td>
									<td>:</td>
									<td>{{ $booking->hotel_name ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->car_type))
								<tr>
									<td><strong>Car Type</strong></td>
									<td>:</td>
									<td>{{ $booking->car_type ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->destination))
								<tr>
									<td><strong>Destination</strong></td>
									<td>:</td>
									<td>{{ $booking->destination ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->from_city))
								<tr>
									<td><strong>From City</strong></td>
									<td>:</td>
									<td>{{ $booking->from_city ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->to_city))
								<tr>
									<td><strong>To City</strong></td>
									<td>:</td>
									<td>{{ $booking->to_city ?? 'N/A' }}</td>
								</tr>
							@endif
							<tr style="background-color: #f8f9fa;">
								<td><strong>Booking Date</strong></td>
								<td>:</td>
								<td>{{ $booking->created_at->format('d M Y') ?? 'N/A' }}</td>
							</tr>
							@if(isset($booking->total_persons))
								<tr>
									<td><strong>Total Persons</strong></td>
									<td>:</td>
									<td>{{ $booking->total_persons }}</td>
								</tr>
							@elseif(isset($booking->no_of_persons))
								<tr>
									<td><strong>Total Persons</strong></td>
									<td>:</td>
									<td>{{ $booking->no_of_persons }}</td>
								</tr>
							@endif
							@if(isset($booking->check_in_date))
								<tr>
									<td><strong>Check-in Date</strong></td>
									<td>:</td>
									<td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->check_out_date))
								<tr>
									<td><strong>Check-out Date</strong></td>
									<td>:</td>
									<td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->pickup_date))
								<tr>
									<td><strong>Pickup Date</strong></td>
									<td>:</td>
									<td>{{ \Carbon\Carbon::parse($booking->pickup_date)->format('d M Y') ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->dropoff_date))
								<tr>
									<td><strong>Dropoff Date</strong></td>
									<td>:</td>
									<td>{{ \Carbon\Carbon::parse($booking->dropoff_date)->format('d M Y') ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->departure_date))
								<tr>
									<td><strong>Departure Date</strong></td>
									<td>:</td>
									<td>{{ \Carbon\Carbon::parse($booking->departure_date)->format('d M Y') ?? 'N/A' }}</td>
								</tr>
							@endif
							@if(isset($booking->return_date))
								<tr>
									<td><strong>Return Date</strong></td>
									<td>:</td>
									<td>{{ \Carbon\Carbon::parse($booking->return_date)->format('d M Y') ?? 'N/A' }}</td>
								</tr>
							@endif
							<tr style="background-color: #f8f9fa;">
								<td><strong>Booking Amount</strong></td>
								<td>:</td>
								<td style="font-weight: bold; color: #28a745;">
									@if(isset($booking->total_price))
										${{ number_format($booking->total_price, 2) }}
									@elseif(isset($booking->price))
										${{ number_format($booking->price, 2) }}
									@else
										N/A
									@endif
								</td>
							</tr>
							@if(isset($booking->status))
								<tr>
									<td><strong>Booking Status</strong></td>
									<td>:</td>
									<td>{{ ucfirst($booking->status) }}</td>
								</tr>
							@endif
						</tbody>
					</table>

					@if(isset($booking->special_requests) || isset($booking->notes))
					<table class="responsive-table" style="margin-top: 15px;">
						<tbody>
							<tr>
								<td><strong>Special Requests / Notes</strong></td>
								<td>:</td>
								<td>{{ $booking->special_requests ?? $booking->notes ?? 'None' }}</td>
							</tr>
						</tbody>
					</table>
					@endif
				</div>
				@endif

				<!-- Action Buttons -->
				<div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
					<a href="{{ route('user.payment', ['amount' => $payment->amount, 'payment_id' => $payment->id]) }}" class="waves-effect waves-light btn-large" style="background-color: #28a745; margin-right: 10px;">
						<i class="fa fa-credit-card"></i> Make Payment
					</a>
					<a href="{{ route('user.payments.list') }}" class="waves-effect waves-light btn-large" style="background-color: #2196F3; margin-right: 10px;">
						<i class="fa fa-arrow-left"></i> Back to Payments
					</a>
					<a href="{{ route('user.dashboard') }}" class="waves-effect waves-light btn-large" style="background-color: #667eea;">
						<i class="fa fa-dashboard"></i> Back to Dashboard
					</a>
				</div>

			</div>
		</div>
	</div>

@endsection
