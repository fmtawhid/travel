@extends('layouts.master')
@section('content')


	
	<!--====== BANNER ==========-->
	<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<div class="spe-title tit-inn-pg">
					<h1><span>{{ $hotel->name }}</span></h1>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>{{ $hotel->location }}</p>
					<ul>
						<li><a href="{{ route('home') }}">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#" class="bread-acti">{{ $hotel->name }}</a></li>
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
						<li class="dl1">Location : {{ $hotel->location }}</li>
						<li class="dl2">Phone : {{ $hotel->phone ?? 'N/A' }}</li>
						<li class="dl3">Email : {{ $hotel->email ?? 'N/A' }}</li>
						<li class="dl4"><a href="#contact">Contact Hotel</a> </li>
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
					<!--====== HOTEL TITLE ==========-->
					<div class="tour_head">
						@php
							$totalReviews = $reviews->count();
							$displayRating = round($averageRating, 1);
						@endphp
						<h2>
							{{ $hotel->name }} 
							<span class="tour_star">
								@for($i = 1; $i <= 5; $i++)
									@if($i <= round($displayRating))
										<i class="fa fa-star" aria-hidden="true"></i>
									@elseif($i - 0.5 <= $displayRating)
										<i class="fa fa-star-half-o" aria-hidden="true"></i>
									@else
										<i class="fa fa-star-o" aria-hidden="true"></i>
									@endif
								@endfor
							</span>
							<span class="tour_rat">{{ $displayRating }} ({{ $totalReviews }} reviews)</span>
						</h2>
					</div>
					<!--====== HOTEL DESCRIPTION ==========-->
					<div class="tour_head1 hotel-com-color">
						<h3>About {{ $hotel->name }}</h3>
						<p>{{ $hotel->description ?? 'Welcome to ' . $hotel->name . '. A premium hotel offering world-class amenities and services.' }}</p>
					</div>






					<!--====== HOTEL AMENITIES ==========-->
					@if($hotel->amenities && is_array($hotel->amenities) && count($hotel->amenities) > 0)
						<div class="tour_head1">
							<h3>Hotel Amenities</h3>
							<ul style="list-style: none; padding: 0;">
								@php
									// Get the amenities details from database
									$amenityIds = $hotel->amenities;
									$amenities = \App\Models\HotelAmenity::whereIn('id', $amenityIds)->get();
								@endphp
								@forelse($amenities as $amenity)
									<li style="padding: 8px 0; display: flex; align-items: center;">
										<i class="fa fa-check" style="color: #28a745; margin-right: 10px;"></i>
										<span>{{ $amenity->name }}</span>
									</li>
								@empty
									<li><i class="fa fa-info-circle" style="color: #999;"></i> No amenities available</li>
								@endforelse
							</ul>
						</div>
					@endif





					<div class="tour_head1 hotel-book-room">
						<h3>Photo Gallery</h3>
						<div id="myCarousel1" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-1">
								@if($hotel->gallery_images && is_array($hotel->gallery_images))
									@foreach($hotel->gallery_images as $image)
										@if(is_string($image))
											<li data-target="#myCarousel1" data-slide-to="{{ $loop->index }}" @if($loop->first) class="active" @endif><img src="{{ asset('uploads/hotels/gallery/' . $image) }}" alt="Hotel Gallery">
											</li>
										@endif
									@endforeach
								@endif
							</ol>
							<!-- Wrapper for slides -->
							<div class="carousel-inner carousel-inner1" role="listbox">
								@if($hotel->gallery_images && is_array($hotel->gallery_images))
									@foreach($hotel->gallery_images as $image)
										@if(is_string($image))
											<div class="item @if($loop->first) active @endif"> <img src="{{ asset('uploads/hotels/gallery/' . $image) }}" alt="Hotel Gallery" width="460" height="345"> </div>
										@endif
									@endforeach
								@endif
								<div class="item @if(!$hotel->gallery_images || !is_array($hotel->gallery_images)) active @endif"> <img src="{{ asset('uploads/hotels/' . $hotel->image) }}" alt="No Gallery Available" width="460" height="345"></div>
							</div>
							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
							<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span> </a>
						</div>
					</div>

					<!--====== HOTEL ROOM TYPES ==========-->
					<div class="tour_head1">
						<h3>ROOMS & AVAILABILITIES</h3>
						<div class="tr-room-type">
							<ul>
								@forelse($roomTypes as $roomType)
									<li>
										<div class="tr-room-type-list">
											<div class="col-md-3 tr-room-type-list-1">
												@if($roomType->images && is_array($roomType->images) && count($roomType->images) > 0 && is_string($roomType->images[0]))
													<img src="{{ asset('uploads/hotels/room_types/' . $roomType->images[0]) }}" alt="{{ $roomType->room_type }}" />
												@else
													<img src="{{ asset('images/rooms/default.jpg') }}" alt="{{ $roomType->room_type }}" />
												@endif
											</div>
											<div class="col-md-6 tr-room-type-list-2">
												<h4>{{ $roomType->room_type }}</h4>
												<p><b>Description: </b>{{ $roomType->description ?? 'Room description not available.' }}</p>
												<span><b>Capacity: </b>{{ $roomType->capacity ?? '2' }} Persons</span>
												@if(!empty($roomType->amenities) && is_array($roomType->amenities))
													<div style="margin-top: 10px;">
														<b>Facilities:</b>
														{{ \App\Models\HotelAmenity::whereIn('id', $roomType->amenities)->pluck('name')->implode(', ') }}
													</div>
												@endif


											</div>
											<div class="col-md-3 tr-room-type-list-3">
												<span class="hot-list-p3-1">Price Per Night</span>
												<span class="hot-list-p3-2">${{ number_format($roomType->price ?? 0, 2) }}</span>
												<a href="{{ route('booking.hotel') }}?hotel_id={{ $hotel->id }}" class="hot-page2-alp-quot-btn spec-btn-text">Book Now</a>
											</div>
										</div>
									</li>
								@empty
									<li><p style="color: #999; padding: 20px;">No rooms available.</p></li>
								@endforelse
							</ul>
						</div>
					</div>

					<!--====== HOTEL LOCATION ==========-->
					<div class="tour_head1 tout-map map-container">
						<h3>Location</h3>
						<p><strong>Address:</strong> {{ $hotel->location }}</p>

						@php
							// Location string কে URL safe বানানো
							$mapLocation = urlencode($hotel->location);
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




					<!--====== CONTACT SECTION ==========-->
					<div class="tour_head1" id="contact">
						<h3>Contact Information</h3>
						<div class="hotel-contact-info">
							<ul style="list-style: none; padding: 0;">
								<li style="padding: 8px 0;"><strong>Name:</strong> {{ $hotel->contact_name ?? 'N/A' }}</li>
								<li style="padding: 8px 0;"><strong>Phone:</strong> {{ $hotel->phone ?? 'N/A' }}</li>
								<li style="padding: 8px 0;"><strong>Mobile:</strong> {{ $hotel->mobile ?? 'N/A' }}</li>
								<li style="padding: 8px 0;"><strong>Email:</strong> <a href="mailto:{{ $hotel->email }}">{{ $hotel->email ?? 'N/A' }}</a></li>
								<li style="padding: 8px 0;"><strong>Location:</strong> {{ $hotel->location }}</li>
								@if($hotel->whatsapp_number)
									<li style="padding: 8px 0;"><strong>WhatsApp:</strong> <a href="https://wa.me/{{ $hotel->whatsapp_number }}" target="_blank">{{ $hotel->whatsapp_number }}</a></li>
								@endif
							</ul>
						</div>
					</div>

					<div>
						<div class="dir-rat">

							{{-- ================= RATING FORM ================= --}}
							<div class="dir-rat-inn dir-rat-title">
								<h3>Write Your Rating Here</h3>
								<p>Share your experience about this hotel</p>
							</div>

							<div class="dir-rat-inn">
								@auth
									@if($userAlreadyReviewed)
										<div style="padding: 20px; background: #d4edda; border-radius: 5px; margin-top: 20px; color: #155724;">
											<p><i class="fa fa-check-circle"></i> <strong>You have already reviewed this hotel. Thank you for your feedback!</strong></p>
										</div>
									@else
										<form action="{{ route('hotel.review.store') }}" method="POST">
											@csrf

											{{-- Hotel ID --}}
											<input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

											{{-- ⭐ Star Rating --}}
											<fieldset class="rating">
												@for($i = 5; $i >= 1; $i--)
													<input type="radio" id="hotel-star{{ $i }}" name="rating" value="{{ $i }}" required />
													<label class="full" for="hotel-star{{ $i }}"></label>
												@endfor
											</fieldset>

											<div class="clearfix"></div>
											<br>

											{{-- Name --}}
											<div class="form-group col-md-6 pad-left-o">
												<input type="text" name="name" class="form-control" placeholder="Enter Name"
													value="{{ auth()->user()->name }}" readonly required>
											</div>

											{{-- Email --}}
											<div class="form-group col-md-6 pad-left-o">
												<input type="email" name="email" class="form-control" placeholder="Enter Email id"
													value="{{ auth()->user()->email }}" readonly>
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
									@endif
								@else
									<div style="padding: 20px; background: #fff3cd; border-radius: 5px; margin-top: 20px;">
										<p><strong>Please <a href="{{ route('login') }}">login</a> to write a review</strong></p>
									</div>
								@endauth
							</div>

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

				<!--====== RIGHT SIDEBAR ==========-->
				<div class="col-md-4 tour_rhs">
					<!--====== HOTEL INFO ==========-->
					<div class="tour_right tour_offer">
						<div class="band1"><img src="{{ asset('images/offer.png') }}" alt="" /> </div>
						<p>Hotel Special</p>
						<h4>{{ $hotel->name }}</h4>
						<a href="{{ route('booking.hotel') }}?hotel_id={{ $hotel->id }}" class="link-btn">Contact Now</a>
					</div>

					<!--====== TRIP INFORMATION ==========-->
					<div class="tour_right tour_incl tour-ri-com">
						<h3>Hotel Information</h3>
						<ul>
							<li><strong>Location:</strong> {{ $hotel->location }}</li>
							<li><strong>Contact Person:</strong> {{ $hotel->contact_person ?? 'N/A' }}</li>
							<li><strong>Phone:</strong> {{ $hotel->phone ?? 'N/A' }}</li>
							<li><strong>Total Rooms:</strong> {{ $roomTypes->count() }}</li>
						</ul>
					</div>

					<!--====== SOCIAL SHARE ==========-->
					<div class="tour_right head_right tour_social tour-ri-com">
						<h3>Share This Hotel</h3>
						<ul>
							<li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
							<li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
							<li><a href="https://twitter.com/share?url={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
							<li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
							<li><a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
						</ul>
					</div>

					<!--====== HELP & SUPPORT ==========-->
					<div class="tour_right head_right tour_help tour-ri-com">
						<h3>Help & Support</h3>
						<div class="tour_help_1">
							<h4 class="tour_help_1_call">Call Hotel</h4>
							<h4><i class="fa fa-phone" aria-hidden="true"></i> {{ $hotel->phone ?? 'N/A' }}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection
