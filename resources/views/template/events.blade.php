@extends('layouts.master')
@section('content')

	<!--====== BANNER ==========-->
	<section>
		<div class="rows inner_banner inner_banner_5">
			<div class="container">
            <div class="spe-title tit-inn-pg">
                <h1>Book <span>Your Favourite Events Now!</span> </h1>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide.</p>
                <ul>
                    <li><a href="main.html">Home</a></li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                    <li><a href="#" class="bread-acti">Events</a>
                    </li>
                </ul>
            </div>
		</div>
	</section>
    
	<!--====== EVENTS ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg events events-1 tb-space" id="inner-page-title">
				<div class="col-md-12">
					<table class="responsive-table">
						<thead>
							<tr>
								<th>#</th>
								<th>Event Name</th>
								<th>Date</th>
								<th>Time</th>
								<th>Location</th>
								<th>Book</th>
							</tr>
						</thead>
						<tbody>
							@forelse($events as $event)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $event->name ?? 'N/A' }}</td>
									<td>{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : 'N/A' }}</td>
									<td>{{ $event->time ?? 'N/A' }}</td>
									<td>{{ $event->location ?? 'N/A' }}</td>
									<td>
										@auth
											<a href="{{ route('booking.event', $event->id) }}" class="link-btn">Book Now</a>
										@else
											<a href="{{ route('login') }}" class="link-btn">Login to Book</a>
										@endauth
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="6" style="text-align: center; color: #999; padding: 20px;">No events available at the moment.</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	
@endsection