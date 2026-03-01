@extends('layouts.user')
@section('user_dashboard')

		<!--CENTER SECTION-->
		<div class="db-2">
			<div class="db-2-com db-2-main">
				<h4>Hotel Booking Details</h4>
				<div class="db-2-main-com db-2-main-com-table">
					<table class="responsive-table">
						<tbody>
							<tr>
								<td><strong>Hotel Name</strong></td>
								<td>:</td>
								<td>{{ $booking->hotel?->name ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Location</strong></td>
								<td>:</td>
								<td>{{ $booking->hotel?->location ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Check-in Date</strong></td>
								<td>:</td>
								<td>{{ $booking->check_in ? \Carbon\Carbon::parse($booking->check_in)->format('d M Y') : 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Check-out Date</strong></td>
								<td>:</td>
								<td>{{ $booking->check_out ? \Carbon\Carbon::parse($booking->check_out)->format('d M Y') : 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Number of Rooms</strong></td>
								<td>:</td>
								<td>{{ $booking->no_of_rooms }}</td>
							</tr>
							<tr>
								<td><strong>Room Type</strong></td>
								<td>:</td>
								<td>{{ $booking->roomType?->room_type ?? 'Standard' }}</td>
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
							<tr style="background-color: #f8f9fa;">
								<td><strong>Payment Status</strong></td>
								<td>:</td>
								<td><span class="db-not-done">Pending</span></td>
							</tr>
						</tbody>
					</table>
					<div class="db-mak-pay-bot" style="margin-top: 30px; background-color: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 5px solid #667eea;">
						<p style="color: #555; line-height: 1.6;">{{ $booking->hotel?->description ?? 'Hotel description not available.' }}</p>
						<div style="margin-top: 15px; display: flex; gap: 10px;">
							<a href="{{ route('user.payment.view', ['hotel', $booking->id]) }}" class="waves-effect waves-light btn-large" style="background-color: #43e97b; flex: 1; text-align: center; display: inline-block;">View Payment</a>
							<a href="{{ route('user.payment') }}" class="waves-effect waves-light btn-large" style="background-color: #667eea; flex: 1; text-align: center; display: inline-block;">Make Payment Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection