@extends('layouts.master')
@section('content')

	<!--====== BANNER ==========-->
	<section>
		<div class="rows inner_banner inner_banner_4">
			<div class="container">
				<div class="spe-title tit-inn-pg">
				<h1>{{ $sightseeing->name }} <span>Sightseeing</span></h1>
				<div class="title-line">
					<div class="tl-1"></div>
					<div class="tl-2"></div>
					<div class="tl-3"></div>
				</div>
				<p>{{ $sightseeing->short_description ?? 'Explore amazing sightseeing locations and create unforgettable memories.' }}</p>
				<ul>
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#" class="bread-acti">{{ $sightseeing->name }}</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS - BOOKING ==========-->
	<section>
		<div class="rows banner_book" id="inner-page-title">
			<div class="container">
				<div class="banner_book_1">
					<ul>
						<li class="dl1">Name : {{ $sightseeing->name }}</li>
						<li class="dl2">Added : {{ $sightseeing->created_at->format('M d, Y') }}</li>
						<li class="dl3">Type : Sightseeing Attraction</li>
						<li class="dl4"><a href="{{ route('booking.tour-package') }}">Book Package</a> </li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space">
				<div class="col-md-8 tour_lhs">
					<!--====== TOUR TITLE ==========-->
					<div class="tour_head">
						<h2>{{ $sightseeing->name }} </h2> </div>
					<!--====== TOUR DESCRIPTION ==========-->
					<div class="tour_head1">
						<h3>Description</h3>
						<p>{{ $sightseeing->long_description ?? 'Explore this amazing sightseeing destination and enjoy the natural beauty and cultural heritage.' }}</p>
					</div>
					<!--====== ROOMS: HOTEL BOOKING ==========-->
					<div class="tour_head1 hotel-book-room">
						<h3>Photo Gallery</h3>
						<div id="myCarousel1" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-1">
								<li data-target="#myCarousel1" data-slide-to="0"><img src="{{ $sightseeing->image ? asset('uploads/sightseeing/' . $sightseeing->image) : asset('assets/templates/images/sight/5.jpg') }}" alt="{{ $sightseeing->name }}">
								</li>
							</ol>
							<!-- Wrapper for slides -->
							<div class="carousel-inner carousel-inner1" role="listbox">
								<div class="item active"> <img src="{{ $sightseeing->image ? asset('uploads/sightseeing/' . $sightseeing->image) : asset('assets/templates/images/sight/5.jpg') }}" alt="{{ $sightseeing->name }}" width="460" height="345"> </div>
							</div>
							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
							<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span> </a>
						</div>
					</div>
					<!--====== TOUR LOCATION ==========-->
					<div class="tour_head1 tout-map map-container">
							<h3>About {{ $sightseeing->name }}</h3>
							<p>{{ $sightseeing->short_description ?? 'This is an amazing sightseeing location worth exploring.' }}</p>
							<p><strong>Last Updated:</strong> {{ $sightseeing->updated_at->format('M d, Y') }}</p>
					</div>
					
				</div>
				<div class="col-md-4 tour_rhs">
					<!--====== SIGHTSEEING INFORMATION ==========-->
					<div class="tour_right tour_incl tour-ri-com">
						<h3>Sightseeing Information</h3>
						<ul>
							<li><strong>Name:</strong> {{ $sightseeing->name }}</li>
							<li><strong>Created:</strong> {{ $sightseeing->created_at->format('M d, Y') }}</li>
							<li><strong>Updated:</strong> {{ $sightseeing->updated_at->format('M d, Y') }}</li>
							<li><strong>Type:</strong> Attraction</li>
						</ul>
					</div>
					@php
                        $currentUrl = urlencode(url()->current());
                        $title = urlencode('Check out this amazing sightseeing!');
                    @endphp

                    <!--====== PACKAGE SHARE ==========-->
                    <div class="tour_right head_right tour_social tour-ri-com">
                        <h3>Share This Sightseeing</h3>
                        <ul>
                            <!-- Facebook -->
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $currentUrl }}" target="_blank">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>

                            <!-- Twitter -->
                            <li>
                                <a href="https://twitter.com/intent/tweet?url={{ $currentUrl }}&text={{ $title }}" target="_blank">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>

                            <!-- LinkedIn -->
                            <li>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $currentUrl }}" target="_blank">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>

                            <!-- WhatsApp -->
                            <li>
                                <a href="https://wa.me/?text={{ $title }}%20{{ $currentUrl }}" target="_blank">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
					<!--====== HELP PACKAGE ==========-->
					<div class="tour_right head_right tour_help tour-ri-com">
						<h3>Need Help?</h3>
						<div class="tour_help_1">
							<h4 class="tour_help_1_call">Book a Package with this Sightseeing</h4>
							<a href="{{ route('booking.tour-package') }}" class="btn btn-primary">Find Tours</a> </div>
					</div>
					<!--====== OTHER SIGHTSEEINGS ==========-->
					<div class="tour_right tour_rela tour-ri-com">
						<h3>Other Sightseeings</h3>
						@forelse($relatedSightSeeings as $related)
							<div class="tour_rela_1"> 
								<img src="{{ $related->image ? asset('uploads/sightseeing/' . $related->image) : asset('assets/templates/images/sight/5.jpg') }}" alt="{{ $related->name }}" />
								<h4>{{ $related->name }}</h4>
								<p>{{ Str::limit($related->short_description, 100, '...') ?? 'Amazing sightseeing destination.' }}</p> 
								<a href="{{ route('sightseeing.details', $related->id) }}" class="link-btn">View this Sightseeing</a> 
							</div>
						@empty
							<p>No other sightseeings available.</p>
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection