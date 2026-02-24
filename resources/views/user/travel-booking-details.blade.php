@extends('layouts.user')
@section('user_dashboard')

		<!--CENTER SECTION-->
		<div class="db-2">
			<div class="db-2-com db-2-main">
				<h4>Travel Details</h4>
				<div class="db-2-main-com db-2-main-com-table">
					<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px;">
						<!-- Tour Title -->
						<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
							<p style="margin: 0 0 10px 0; font-size: 12px; opacity: 0.9; text-transform: uppercase;">Tour Package</p>
						<h3 style="margin: 0; font-size: 20px;">{{ $booking->tour?->title ?? 'N/A' }}</h3>
						</div>

						<!-- Location -->
						<div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
							<p style="margin: 0 0 10px 0; font-size: 12px; opacity: 0.9; text-transform: uppercase;">Location</p>
						<h3 style="margin: 0; font-size: 20px;">{{ $booking->tour?->location ?? 'N/A' }}</h3>
						</div>

						<!-- Duration -->
						<div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
							<p style="margin: 0 0 10px 0; font-size: 12px; opacity: 0.9; text-transform: uppercase;">Duration</p>
						<h3 style="margin: 0; font-size: 20px;">{{ $booking->tour?->duration ?? 'N/A' }}</h3>
						</div>

						<!-- Price -->
						<div style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
							<p style="margin: 0 0 10px 0; font-size: 12px; opacity: 0.9; text-transform: uppercase;">Price</p>
						<h3 style="margin: 0; font-size: 20px;">${{ $booking->tour?->price ?? '0' }}</h3>
						</div>

						<!-- Tour Start Date -->
						<div style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
							<p style="margin: 0 0 10px 0; font-size: 12px; opacity: 0.9; text-transform: uppercase;">Tour Start</p>
						<h3 style="margin: 0; font-size: 20px;">{{ $booking->tour?->start_date ? \Carbon\Carbon::parse($booking->tour->start_date)->format('d M Y') : 'N/A' }}</h3>
						</div>

						<!-- Tour End Date -->
						<div style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); color: #333; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
							<p style="margin: 0 0 10px 0; font-size: 12px; opacity: 0.8; text-transform: uppercase;">Tour End</p>
						<h3 style="margin: 0; font-size: 20px;">{{ $booking->tour?->end_date ? \Carbon\Carbon::parse($booking->tour->end_date)->format('d M Y') : 'N/A' }}</h3>
						</div>

						<!-- Booking Start Date -->
						<div style="background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%); color: #333; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
							<p style="margin: 0 0 10px 0; font-size: 12px; opacity: 0.8; text-transform: uppercase;">Your Check-in</p>
							<h3 style="margin: 0; font-size: 20px;">{{ $booking->arrival ? \Carbon\Carbon::parse($booking->arrival)->format('d M Y') : 'N/A' }}</h3>
						</div>

						<!-- Booking End Date -->
						<div style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); color: #333; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
							<p style="margin: 0 0 10px 0; font-size: 12px; opacity: 0.8; text-transform: uppercase;">Your Check-out</p>
							<h3 style="margin: 0; font-size: 20px;">{{ $booking->departure ? \Carbon\Carbon::parse($booking->departure)->format('d M Y') : 'N/A' }}</h3>
						</div>

						<!-- Total Members -->
						<div style="background: linear-gradient(135deg, #ff9a56 0%, #ff6a00 100%); color: white; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
							<p style="margin: 0 0 10px 0; font-size: 12px; opacity: 0.9; text-transform: uppercase;">Members</p>
							<h3 style="margin: 0; font-size: 20px;">{{ ($booking->noofadults ?? 0) + ($booking->noofchildrens ?? 0) }}</h3>
							<small style="font-size: 12px; opacity: 0.9;">(Adult:{{ $booking->noofadults ?? 0 }}, Children:{{ $booking->noofchildrens ?? 0 }})</small>
						</div>
					</div>

					<!-- Additional Details Table -->
					<table class="responsive-table" style="margin-top: 30px;">
						<tbody>
							<tr style="background-color: #f8f9fa;">
								<td><strong>Tour Description</strong></td>
							<td colspan="2">{{ $booking->tour?->short_description ?? 'Tour description not available.' }}</td>
							</tr>
							<tr>
								<td><strong>Includes</strong></td>
								<td colspan="2">
								@if($booking->tour?->include_sightseeing) ✓ Sightseeing @endif
								@if($booking->tour?->include_hotel) ✓ Hotel @endif
								@if($booking->tour?->include_transfer) ✓ Transfer @endif
								@if($booking->tour?->include_luggage) ✓ Luggage @endif
								</td>
							</tr>
							<tr style="background-color: #f8f9fa;">
								<td><strong>Payment Status</strong></td>
								<td colspan="2"><span class="db-not-done">Pending</span></td>
							</tr>
						</tbody>
					</table>

					<!-- Description & Payment Button -->
					<div class="db-mak-pay-bot" style="margin-top: 30px; background-color: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 5px solid #667eea;">
							<p style="color: #555; line-height: 1.6;">{{ $booking->tour?->long_description ?? 'Tour description not available.' }}</p>
						<a href="{{ route('user.payment') }}" class="waves-effect waves-light btn-large" style="background-color: #667eea; margin-top: 15px;">Make Payment Now</a> 
					</div>
				</div>
			</div>
		</div>

		<style>
			@media (max-width: 768px) {
				div[style*="grid-template-columns"] {
					grid-template-columns: 1fr !important;
				}
			}
		</style>
@endsection