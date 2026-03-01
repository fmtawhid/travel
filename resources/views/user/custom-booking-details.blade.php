@extends('layouts.user')
@section('user_dashboard')

		<!--CENTER SECTION-->
		<div class="db-2">
			<div class="db-2-com db-2-main">
				<h4>Custom Package Booking Details</h4>
				<div class="db-2-main-com db-2-main-com-table">
					<table class="responsive-table">
						<tbody>
							<tr>
								<td><strong>Name</strong></td>
								<td>:</td>
								<td>{{ $booking->name }}</td>
							</tr>
							<tr>
								<td><strong>Email</strong></td>
								<td>:</td>
								<td>{{ $booking->email }}</td>
							</tr>
							<tr>
								<td><strong>Phone</strong></td>
								<td>:</td>
								<td>{{ $booking->phone }}</td>
							</tr>
							<tr>
								<td><strong>City/Place</strong></td>
								<td>:</td>
								<td>{{ $booking->city ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Number of Travellers</strong></td>
								<td>:</td>
								<td>{{ $booking->howmanytravellers ?? 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Arrival Date</strong></td>
								<td>:</td>
								<td>{{ $booking->arrival ? \Carbon\Carbon::parse($booking->arrival)->format('d M Y') : 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Departure Date</strong></td>
								<td>:</td>
								<td>{{ $booking->departure ? \Carbon\Carbon::parse($booking->departure)->format('d M Y') : 'N/A' }}</td>
							</tr>
							<tr>
								<td><strong>Number of Adults</strong></td>
								<td>:</td>
								<td>{{ $booking->noofadults ?? 0 }}</td>
							</tr>
							<tr>
								<td><strong>Number of Children</strong></td>
								<td>:</td>
								<td>{{ $booking->noofchildrens ?? 0 }}</td>
							</tr>
							<tr>
								<td><strong>Total Guests</strong></td>
								<td>:</td>
								<td>{{ ($booking->noofadults ?? 0) + ($booking->noofchildrens ?? 0) }} (Adult: {{ $booking->noofadults }}, Children: {{ $booking->noofchildrens ?? 0 }})</td>
							</tr>
							<tr>
								<td><strong>Budget Range</strong></td>
								<td>:</td>
								<td>${{ $booking->minprice ?? 0 }} - ${{ $booking->maxprice ?? 0 }}</td>
							</tr>
							
						</tbody>
					</table>
					<div class="db-mak-pay-bot" style="margin-top: 30px; background-color: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 5px solid #667eea;">
						<p style="color: #555; line-height: 1.6;">{{ $booking->notes ?? 'Please wait for confirmation from our team. We will contact you soon.' }}</p>
						<div style="margin-top: 15px; display: flex; gap: 10px;">
							<a href="{{ route('user.payment.view', ['custom', $booking->id]) }}" class="waves-effect waves-light btn-large" style="background-color: #43e97b; flex: 1; text-align: center; display: inline-block;">View Payment</a>
							<a href="{{ route('user.payment') }}" class="waves-effect waves-light btn-large" style="background-color: #667eea; flex: 1; text-align: center; display: inline-block;">Make Payment Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
