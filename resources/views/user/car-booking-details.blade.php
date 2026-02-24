@extends('layouts.user')
@section('user_dashboard')

		<!--CENTER SECTION-->
		<div class="db-2">
			<div class="db-2-com db-2-main">
				<h4>Car Rental Booking Details</h4>
				<div class="db-2-main-com db-2-main-com-table">
					<table class="responsive-table">
						<tbody>
							<tr>
								<td><strong>Car Type</strong></td>
								<td>:</td>
								<td>{{ $booking->car_type ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Pickup Location</strong></td>
								<td>:</td>
								<td>{{ $booking->pickup_location ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Dropoff Location</strong></td>
								<td>:</td>
								<td>{{ $booking->dropoff_location ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Pickup Date</strong></td>
								<td>:</td>
								<td>{{ $booking->pickup_date ? \Carbon\Carbon::parse($booking->pickup_date)->format('d M Y') : 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Pickup Time</strong></td>
								<td>:</td>
								<td>{{ $booking->pickup_time ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Dropoff Date</strong></td>
								<td>:</td>
								<td>{{ $booking->dropoff_date ? \Carbon\Carbon::parse($booking->dropoff_date)->format('d M Y') : 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Dropoff Time</strong></td>
								<td>:</td>
								<td>{{ $booking->dropoff_time ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Total Passengers</strong></td>
								<td>:</td>
								<td>{{ $booking->total_passengers }}</td>
							</tr>
							<tr>
								<td><strong>Adults</strong></td>
								<td>:</td>
								<td>{{ $booking->no_of_adults }}</td>
							</tr>
							<tr>
								<td><strong>Children</strong></td>
								<td>:</td>
								<td>{{ $booking->no_of_childrens ?? 0 }}</td>
							</tr>
							<tr>
								<td><strong>Total Guests</strong></td>
								<td>:</td>
								<td>{{ ($booking->no_of_adults ?? 0) + ($booking->no_of_childrens ?? 0) }} (Adult: {{ $booking->no_of_adults }}, Children: {{ $booking->no_of_childrens ?? 0 }})</td>
							</tr>
							<tr>
								<td><strong>Min Price</strong></td>
								<td>:</td>
								<td>${{ $booking->min_price ?? '0' }}</td>
							</tr>
							<tr>
								<td><strong>Max Price</strong></td>
								<td>:</td>
								<td>${{ $booking->max_price ?? '0' }}</td>
							</tr>
							<tr style="background-color: #f8f9fa;">
								<td><strong>Payment Status</strong></td>
								<td>:</td>
								<td><span class="db-not-done">Pending</span></td>
							</tr>
						</tbody>
					</table>
					<div class="db-mak-pay-bot" style="margin-top: 30px; background-color: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 5px solid #667eea;">
						<p style="color: #555; line-height: 1.6;">Book your car for a comfortable journey. Your reservation details are secure with us.</p>
						<a href="{{ route('user.payment') }}" class="waves-effect waves-light btn-large" style="background-color: #667eea; margin-top: 15px;">Make Payment Now</a>
					</div>
				</div>
			</div>
		</div>
@endsection
