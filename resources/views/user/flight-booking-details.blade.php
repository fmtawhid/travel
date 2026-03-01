@extends('layouts.user')
@section('user_dashboard')

		<!--CENTER SECTION-->
		<div class="db-2">
			<div class="db-2-com db-2-main">
				<h4>Flight Booking Details</h4>
				<div class="db-2-main-com db-2-main-com-table">
					<table class="responsive-table">
						<tbody>
							<tr>
								<td><strong>Flying From</strong></td>
								<td>:</td>
								<td>{{ $booking->flying_from ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Flying To</strong></td>
								<td>:</td>
								<td>{{ $booking->flying_to ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Arrival Date</strong></td>
								<td>:</td>
								<td>{{ $booking->arrival_date ? \Carbon\Carbon::parse($booking->arrival_date)->format('d M Y') : 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Departure Date</strong></td>
								<td>:</td>
								<td>{{ $booking->departure_date ? \Carbon\Carbon::parse($booking->departure_date)->format('d M Y') : 'N/A' }}</td>
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
								<td><strong>Total Passengers</strong></td>
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
						<p style="color: #555; line-height: 1.6;">Your flight booking has been confirmed. Please make the payment to complete your reservation and receive your flight tickets.</p>
						<div style="margin-top: 15px; display: flex; gap: 10px;">
							<a href="{{ route('user.payment.view', ['flight', $booking->id]) }}" class="waves-effect waves-light btn-large" style="background-color: #43e97b; flex: 1; text-align: center; display: inline-block;">View Payment</a>
							<a href="{{ route('user.payment') }}" class="waves-effect waves-light btn-large" style="background-color: #667eea; flex: 1; text-align: center; display: inline-block;">Make Payment Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
