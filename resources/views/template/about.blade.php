@extends('layouts.master')
@section('content')

		
	<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<div class="spe-title tit-inn-pg">
					<h1>{{ $aboutPage->title ?? 'About' }} <span>Us</span> </h1>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>{{ $aboutPage->subtitle ?? "World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide." }}</p>
					<ul>
						<li><a href="{{ route('home') }}">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#" class="bread-acti">About</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== ABOUT CONTENT ==========-->
	<section class="tourb2-ab-p-2 com-colo-abou">
		<div class="container">
			<div class="row tourb2-ab-p1">
				<div class="col-md-6 col-sm-6">
					<div class="tourb2-ab-p1-left">
						<h3>{{ $aboutPage->title ?? 'Hi! Welcome to Holiday Tour & Travels' }}</h3>
						@if($aboutPage->subtitle)
							<span>{{ $aboutPage->subtitle }}</span>
						@endif
						<p>{!! nl2br(e($aboutPage->description ?? '')) !!}</p>
						@if($aboutPage->phone)
							<a href="tel:{{ $aboutPage->phone }}" class="link-btn">Call to us: {{ $aboutPage->phone }}</a>
						@endif
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="tourb2-ab-p1-right"> 
						<img src="{{ $aboutPage && $aboutPage->image ? asset($aboutPage->image) : asset('assets/templates/images/iplace-8.jpg') }}" alt="About Page" /> 
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="tourb2-ab-p-3 com-colo-abou">
		<div class="container">
			<div class="row tourb2-ab-p3">
				<div class="col-md-3 col-sm-6">
					<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>{{ $totalPackages }}</span>
						<h4>Packages</h4>
						<p>Explore our curated collection of travel packages designed for every budget and preference. From luxurious getaways to adventure tours, find your perfect vacation.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>{{ $totalPlaces }}</span>
						<h4>Places</h4>
						<p>Discover stunning sightseeing locations around the world. From iconic landmarks to hidden gems, explore breathtaking destinations and create unforgettable memories.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>{{ $totalEvents }}</span>
						<h4>Events</h4>
						<p>Join exclusive travel events and experiences worldwide. Attend festivals, concerts, exhibitions, and cultural celebrations with guided tours and special packages.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>{{ $totalHotels }}</span>
						<h4>Hotels</h4>
						<p>Stay in comfortable accommodations ranging from budget-friendly to 5-star luxury hotels. Book your perfect stay with exclusive discounts and special amenities.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="tourb2-ab-p-4 com-colo-abou">
		<div class="container">
			<div class="row tourb2-ab-p4">
				@if($aboutPage && $aboutPage->services && count($aboutPage->services) > 0)
					@foreach($aboutPage->services as $service)
						<div class="col-md-6 col-sm-6">
							<div class="tourb2-ab-p4-1 tourb2-ab-p4-com">
								<i class="{{ $service['icon'] ?? 'fa fa-flag-o' }}" aria-hidden="true"></i>
								<div class="tourb2-ab-p4-text">
									<h4><span>{{ $service['title'] ?? 'Service' }}</span></h4>
									<p>{{ $service['description'] ?? 'Service description' }}</p>
								</div>
							</div>
						</div>
					@endforeach
				@else
					<!-- Default Services -->
					<div class="col-md-6 col-sm-6">
						<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-flag-o" aria-hidden="true"></i>
							<div class="tourb2-ab-p4-text">
								<h4><span>Travel</span> Booking</h4>
								<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-map-o" aria-hidden="true"></i>
							<div class="tourb2-ab-p4-text">
								<h4><span>Hotel</span> Booking</h4>
								<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-gamepad" aria-hidden="true"></i>
							<div class="tourb2-ab-p4-text">
								<h4><span>Events</span> Booking</h4>
								<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-umbrella" aria-hidden="true"></i>
							<div class="tourb2-ab-p4-text">
								<h4><span>Sight Seeing</span> Booking</h4>
								<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-binoculars" aria-hidden="true"></i>
							<div class="tourb2-ab-p4-text">
								<h4><span>Tour</span> Discount</h4>
								<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-globe" aria-hidden="true"></i>
							<div class="tourb2-ab-p4-text">
								<h4><span>Top</span> Brandings</h4>
								<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</section>
	<!--====== TIPS BEFORE TRAVEL ==========-->
	<section>
		<div class="rows tips tips-home tb-space home_title">
			<div class="container tips_1">
				<!-- TIPS BEFORE TRAVEL -->
				<div class="col-md-4 col-sm-6 col-xs-12">
					<h3>Tips Before Travel</h3>
					<div class="tips_left tips_left_1">
						<h5>Bring copies of your passport</h5>
						<p>Aliquam pretium id justo eget tristique. Aenean feugiat vestibulum blandit.</p>
					</div>
					<div class="tips_left tips_left_2">
						<h5>Register with your embassy</h5>
						<p>Mauris efficitur, ante sit amet rhoncus malesuada, orci justo sollicitudin.</p>
					</div>
					<div class="tips_left tips_left_3">
						<h5>Always have local cash</h5>
						<p>Donec et placerat ante. Etiam et velit in massa. </p>
					</div>
				</div>
				<!-- CUSTOMER TESTIMONIALS -->
				<div class="col-md-8 col-sm-6 col-xs-12 testi-2">
					<!-- TESTIMONIAL TITLE -->
					<h3>Customer Testimonials</h3>
					<div class="testi">
						<h4>John William</h4>
						<p>Ut sed sem quis magna ultricies lacinia et sed tortor. Ut non tincidunt nisi, non elementum lorem. Aliquam gravida sodales</p> <address>Illinois, United States of America</address> </div>
					<!-- ARRANGEMENTS & HELPS -->
					<h3>Arrangement & Helps</h3>
					<div class="arrange">
						<ul>
							<!-- LOCATION MANAGER -->
							<li>
								<a href="#"><img src="{{ asset('assets/templates/images/Location-Manager.png') }}" alt=""> </a>
							</li>
							<!-- PRIVATE GUIDE -->
							<li>
								<a href="#"><img src="{{ asset('assets/templates/images/Private-Guide.png') }}" alt=""> </a>
							</li>
							<!-- ARRANGEMENTS -->
							<li>
								<a href="#"><img src="{{ asset('assets/templates/images/Arrangements.png') }}" alt=""> </a>
							</li>
							<!-- EVENT ACTIVITIES -->
							<li>
								<a href="#"><img src="{{ asset('assets/templates/images/Events-Activities.png') }}" alt=""> </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--====== TIPS BEFORE TRAVEL ==========-->
@endsection