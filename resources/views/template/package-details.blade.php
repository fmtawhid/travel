@extends('layouts.master')
@section('content')



	<!--====== BANNER ==========-->
	<section>
		<div class="rows inner_banner inner_banner_4">
			<div class="container">
				<div class="spe-title tit-inn-pg">
					<h1>{{ $tour->title }} <span>{{ $tour->package_type ?? 'Package' }}</span></h1>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide.</p>
					<ul>
						<li><a href="main.html">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#" class="bread-acti">{{ $tour->title }}</a>
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
						<li class="dl1">Location : {{ $tour->location }}</li>
						<li class="dl2">Price : ${{ $tour->discount_price ?? $tour->price}}</li>
						<li class="dl3">Duration : {{ $tour->duration }}</li>
						<li class="dl4"><a href="{{ route('booking.tour-package', $tour->id) }}">Book Now</a> </li>
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
					{{-- <div class="tour_head">
						<h2>{{ $tour->title }} <span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i
									class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
									aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i
									class="fa fa-star-half-o" aria-hidden="true"></i></span><span
								class="tour_rat">{{ $tour->rating ?? '4.0' }}</span></h2>
					</div> --}}
					<!--====== TOUR TITLE ==========-->
					<div class="tour_head">
						@php
							$totalReviews = $reviews->count();
							$averageRating = $totalReviews ? number_format($reviews->avg('rating'), 1) : '4.0';
						@endphp

						<h2>
							{{ $tour->title }} 
							<span class="tour_star">
								@for($i = 1; $i <= 5; $i++)
									@if($i <= round($averageRating))
										<i class="fa fa-star" aria-hidden="true"></i>
									@elseif($i - 0.5 <= $averageRating)
										<i class="fa fa-star-half-o" aria-hidden="true"></i>
									@else
										<i class="fa fa-star-o" aria-hidden="true"></i>
									@endif
								@endfor
							</span>
							<span class="tour_rat">{{ $averageRating }} ({{ $totalReviews }} reviews)</span>
						</h2>
					</div>

					<!--====== TOUR DESCRIPTION ==========-->
					<div class="tour_head1">
						<h3>Description</h3>
						<p>{{ $tour->long_description }}</p>
					</div>
					<!--====== ROOMS: HOTEL BOOKING ==========-->
					<div class="tour_head1 hotel-book-room">
						<h3>Photo Gallery</h3>
						<div id="myCarousel1" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-1">
								@forelse($galleries as $key => $gallery)
									<li data-target="#myCarousel1" data-slide-to="{{ $key }}"><img
											src="{{ asset('uploads/tours/gallery/' . $gallery->image) }}"
											alt="{{ $tour->title }}">
									</li>
								@empty
									<li data-target="#myCarousel1" data-slide-to="0"><img src="images/gallery/placeholder.jpg"
											alt="No Gallery">
									</li>
								@endforelse
							</ol>
							<!-- Wrapper for slides -->
							<div class="carousel-inner carousel-inner1" role="listbox">
								@forelse($galleries as $key => $gallery)
									<div class="item @if($key == 0) active @endif"> <img
											src="{{ asset('uploads/tours/gallery/' . $gallery->image) }}" alt="{{ $tour->title }}"
											width="460" height="345"> </div>
								@empty
									<div class="item active"> <img src="images/gallery/placeholder.jpg"
											alt="No Gallery Available" width="460" height="345"> </div>
								@endforelse
							</div>
							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i
										class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
							<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i
										class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1"
										aria-hidden="true"></i></span> </a>
						</div>
					</div>
					<!--====== TOUR LOCATION ==========-->

					<div class="tour_head1 tout-map map-container">
						<h3>Location</h3>
						<p><strong>Address:</strong> {{ $tour->location }}</p>

						@php
							// Location string কে URL safe বানানো
							$mapLocation = urlencode($tour->location);
						@endphp

						<iframe 
							width="100%" 
							height="450" 
							style="border:0;" 
							loading="lazy" 
							allowfullscreen
							referrerpolicy="no-referrer-when-downgrade"
							src="https://www.google.com/maps?q={{ $mapLocation }}&output=embed">
						</iframe>
					</div>

					<!--====== ABOUT THE TOUR ==========-->
					<div class="tour_head1">
						<h3>About The Tour</h3>
						<table>
							<tr>
								<th>Places covered</th>
								<th class="event-res">Inclusions</th>
								<th class="event-res">Exclusions</th>
								<th>Event Date</th>
							</tr>
							<tr>
								<td>{{ $tour->location }}</td>
								<td class="event-res">
									@if($tour->include_sightseeing) Sightseeing @endif
									@if($tour->include_hotel) Accommodation @endif
									@if($tour->include_transfer) Transfer @endif
								</td>
								<td class="event-res">-</td>
								<td>{{ $tour->start_date ? \Carbon\Carbon::parse($tour->start_date)->format('M d, Y') : '-' }}
								</td>
							</tr>
						</table>
					</div>
					<!--====== DURATION ==========-->
					<div class="tour_head1 l-info-pack-days days">
						<h3>Detailed Day Wise Itinerary</h3>
						<ul>
							@forelse($itineraries as $itinerary)
								<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
									<h4><span>Day : {{ $itinerary->day_number }}</span> {{ $itinerary->title }}</h4>
									<p>{{ $itinerary->description }}</p>
								</li>
							@empty
								<li class="l-info-pack-plac">
									<p>No Itinerary Available</p>
								</li>
							@endforelse
						</ul>
					</div>
					<div>
						<div class="dir-rat">

							{{-- ================= RATING FORM ================= --}}
							<div class="dir-rat-inn dir-rat-title">
								<h3>Write Your Rating Here</h3>
								<p>Share your experience about this tour</p>
							</div>

							@if($userAlreadyReviewed)
								<div class="dir-rat-inn" style="background-color: #fff3cd; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
									<p style="color: #856404; margin: 0;"><i class="fa fa-check-circle"></i> You have already reviewed this tour. Thank you for your feedback!</p>
								</div>
							@else
								<div class="dir-rat-inn">
									<form action="{{ route('tour.review.store', $tour->id) }}" method="POST">
										@csrf

										{{-- Tour ID --}}
										<input type="hidden" name="tour_id" value="{{ $tour->id }}">

										{{-- Hidden user id if logged in --}}
										@auth
											<input type="hidden" name="user_id" value="{{ auth()->id() }}">
										@endauth

										{{-- ⭐ Star Rating --}}
										<fieldset class="rating">
											@for($i = 5; $i >= 1; $i--)
												<input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required />
												<label class="full" for="star{{ $i }}"></label>
											@endfor
										</fieldset>

										<div class="clearfix"></div>
										<br>

										{{-- Name --}}
										<div class="form-group col-md-6 pad-left-o">
											<input type="text" name="name" class="form-control" placeholder="Enter Name"
												value="{{ auth()->check() ? auth()->user()->name : old('name') }}" 
												{{ auth()->check() ? 'readonly' : '' }} required>
										</div>

										{{-- Mobile --}}
										<div class="form-group col-md-6 pad-left-o">
											<input type="number" name="mobile" class="form-control" placeholder="Enter Mobile"
												value="{{ old('mobile') }}">
										</div>

										{{-- Email --}}
										<div class="form-group col-md-6 pad-left-o">
											<input type="email" name="email" class="form-control" placeholder="Enter Email id"
												value="{{ auth()->check() ? auth()->user()->email : old('email') }}" 
												{{ auth()->check() ? 'readonly' : '' }}>
										</div>

										{{-- City --}}
										<div class="form-group col-md-6 pad-left-o">
											<input type="text" name="city" class="form-control" placeholder="Enter your City"
												value="{{ old('city') }}">
										</div>

										{{-- Message --}}
										<div class="form-group col-md-12 pad-left-o">
											<textarea name="message" class="form-control" placeholder="Write your message"
												required>{{ old('message') }}</textarea>
										</div>

										{{-- Submit --}}
										<div class="form-group col-md-12 pad-left-o">
											<button type="submit" class="link-btn">SUBMIT</button>
										</div>
									</form>
								</div>
							@endif

							{{-- ================= REVIEW LIST ================= --}}
							@forelse($reviews as $review)
								<div class="dir-rat-inn dir-rat-review">
									<div class="row">
										<div class="col-md-3 dir-rat-left">
											@if($review->user && $review->user->image)
												<img src="{{ asset('uploads/users/' . $review->user->image) }}" alt="{{ $review->name }}" style="width: -webkit-fill-available; height: 100px; object-fit: cover; border-radius: 50%;"/>
											@else
												<img src="{{ asset('assets/templates/images/reviewer/1.jpg') }}" alt="{{ $review->name }}" />
											@endif
											<p>
												{{ $review->name ?? 'Anonymous' }}
												<span>{{ $review->created_at->format('d F, Y') }}</span>
											</p>
										</div>

										<div class="col-md-9 dir-rat-right">
											<div class="dir-rat-star">
												@for($i = 1; $i <= 5; $i++)
													<i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
												@endfor
											</div>

											<p>{{ $review->message }}</p>
										</div>
									</div>
								</div>
							@empty
								<div class="dir-rat-inn">
									<p>No reviews yet</p>
								</div>
							@endforelse

						</div>
					</div>

					<style>
					.rating {
						border: none;
						float: left;
					}
					.rating>input {
						display: none;
					}
					.rating>label {
						float: right;
						font-size: 30px;
						color: #ddd;
						cursor: pointer;
					}
					.rating>label:before {
						content: "\f005";
						font-family: FontAwesome;
					}
					.rating>input:checked~label,
					.rating>label:hover,
					.rating>label:hover~label {
						color: #ffc107;
					}
					</style>

				</div>
				<div class="col-md-4 tour_rhs">
					<!--====== SPECIAL OFFERS ==========-->
					<div class="tour_right tour_offer">
						<div class="band1"><img src="{{ asset('assets/templates/images/offer.png') }}" alt="" /> </div>
						@if($tour->discount_percentage && $tour->discount_percentage > 0)
							<p>Special Offer</p>
							<h4>${{ $tour->discount_price ?? $tour->price }}<span class="n-td">
									<span class="n-td-1">${{ $tour->price }}</span>
								</span>
							</h4>
						@else
							<h4>${{ $tour->discount_price ?? $tour->price}}</h4>
						@endif
						<a href="booking.html" class="link-btn">Book Now</a>
					</div>
					<!--====== TRIP INFORMATION ==========-->
					<div class="tour_right tour_incl tour-ri-com">
						<h3>Trip Information</h3>
						<ul>
							<li>Location : {{ $tour->location }}</li>
							@if($tour->start_date)
								<li>Arrival Date: {{ \Carbon\Carbon::parse($tour->start_date)->format('M d, Y') }}</li>
							@endif
							@if($tour->end_date)
								<li>Departure Date: {{ \Carbon\Carbon::parse($tour->end_date)->format('M d, Y') }}</li>
							@endif
							<li>
								@if($tour->include_sightseeing) Free Sightseeing @endif
								@if($tour->include_hotel) & Hotel @endif
								@if($tour->include_transfer) & Transfer @endif
								@if($tour->include_luggage) & Luggage @endif
							</li>
						</ul>
					</div>
					<!--====== PACKAGE SHARE ==========-->
					<div class="tour_right head_right tour_social tour-ri-com">
						<h3>Share This Package</h3>
						<ul>
							@php
								$url = urlencode(Request::fullUrl());
								$title = urlencode($package->name ?? 'Check this package!');
							@endphp

							{{-- Facebook --}}
							<li>
								<a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</li>

							{{-- Google Plus (deprecated, can remove if needed) --}}
							<li>
								<a href="https://plus.google.com/share?url={{ $url }}" target="_blank">
									<i class="fa fa-google-plus" aria-hidden="true"></i>
								</a>
							</li>

							{{-- Twitter --}}
							<li>
								<a href="https://twitter.com/intent/tweet?text={{ $title }}&url={{ $url }}" target="_blank">
									<i class="fa fa-twitter" aria-hidden="true"></i>
								</a>
							</li>

							{{-- LinkedIn --}}
							<li>
								<a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $url }}" target="_blank">
									<i class="fa fa-linkedin" aria-hidden="true"></i>
								</a>
							</li>

							{{-- WhatsApp --}}
							<li>
								<a href="https://api.whatsapp.com/send?text={{ $title }}%20{{ $url }}" target="_blank">
									<i class="fa fa-whatsapp" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div>

					<!--====== HELP PACKAGE ==========-->
					<div class="tour_right head_right tour_help tour-ri-com">
						<h3>Help & Support</h3>
						<div class="tour_help_1">
							<h4 class="tour_help_1_call">Call Us Now</h4>
							<h4><i class="fa fa-phone" aria-hidden="true"></i> 10-800-123-000</h4>
						</div>
					</div>
					<!--====== POPULAR TOUR PACKAGES ==========-->
					<div class="tour_right tour_rela tour-ri-com">
						<h3>Popular Packages</h3>

						@forelse($popularPackages as $popTour)
							<div class="tour_rela_1">
								<img src="{{ asset('uploads/tours/' . ($popTour->image ?? 'default.jpg')) }}" alt="{{ $popTour->title }}" />
								<h4>{{ $popTour->title }}</h4>
								<p>{{ Str::limit($popTour->short_description ?? '', 80) }}</p>
								<a href="{{ route('package.details', $popTour->id) }}" class="link-btn">View this Package</a>
							</div>
						@empty
							<p>No popular packages found.</p>
						@endforelse
					</div>

				</div>
			</div>
		</div>
	</section>

@endsection