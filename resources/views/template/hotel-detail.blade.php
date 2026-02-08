@extends('layouts.master')
@section('content')

    <!--END HEADER SECTION-->
	<!-- TOP SEARCH BOX -->
	<section>
        <div class="search-top pop pop-search">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ban-search form-select">
                            <form>
                                <ul>
                                    <li class="sr-look">
                                        <div class="form-group">
                                            <label>Your destination</label>
                                            <select class="chosen-select">
                                                <option>Your destination</option>
                                                <option>Any location</option>
                                                <option>Chennai</option>
                                                <option>New york</option>
                                                <option>Perth</option>
                                                <option>London</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="sr-gue">
                                        <div class="form-group">
                                            <label>Package</label>
                                            <select class="chosen-select">
                                                <option>Package</option>
                                                <option>Family Package</option>
                                                <option>Honeymoon Package</option>
                                                <option>Group Package</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="sr-date">
                                        <div class="form-group">
                                            <label>Check in</label>
                                            <input type="text" class="form-control datepicker" name="from" placeholder="Check in">
                                        </div>
                                    </li>
                                    <li class="sr-date">
                                        <div class="form-group">
                                            <label>Check out</label>
                                            <input type="text" class="form-control datepicker" name="to" placeholder="Check out">
                                        </div>
                                    </li>
                                    <li class="sr-btn">
                                        <input type="submit" value="Search">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			<span class="menu-pop-clo pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
        </div>
		<!-- END TOP SEARCH BOX -->
    </section>
    <!--END HEADER SECTION-->
	
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
						<h2>{{ $hotel->name }} <span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span><span class="tour_rat">4.5</span></h2> 
					</div>
					<!--====== HOTEL DESCRIPTION ==========-->
					<div class="tour_head1 hotel-com-color">
						<h3>About {{ $hotel->name }}</h3>
						<p>{{ $hotel->description ?? 'Welcome to ' . $hotel->name . '. A premium hotel offering world-class amenities and services.' }}</p>
					</div>

					<!--====== HOTEL GALLERY ==========-->
					<div class="tour_head1 hotel-book-room">
						<h3>Photo Gallery</h3>
						@if($hotel->gallery_images && is_array($hotel->gallery_images) && count($hotel->gallery_images) > 0)
							<div id="hotelCarousel" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators carousel-indicators-1">
									@foreach($hotel->gallery_images as $key => $image)
										<li data-target="#hotelCarousel" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif>
											<img src="{{ asset('uploads/' . $image) }}" alt="Hotel Gallery">
										</li>
									@endforeach
								</ol>
								<div class="carousel-inner carousel-inner1" role="listbox">
									@foreach($hotel->gallery_images as $key => $image)
										<div class="item @if($key == 0) active @endif">
											<img src="{{ asset('uploads/' . $image) }}" alt="Hotel Gallery" width="460" height="345">
										</div>
									@endforeach
								</div>
								<a class="left carousel-control" href="#hotelCarousel" role="button" data-slide="prev">
									<span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span>
								</a>
								<a class="right carousel-control" href="#hotelCarousel" role="button" data-slide="next">
									<span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span>
								</a>
							</div>
						@else
							<p style="color: #999;">No gallery images available.</p>
						@endif
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
												<img src="{{ $roomType->image ?? asset('images/rooms/default.jpg') }}" alt="{{ $roomType->name }}" />
											</div>
											<div class="col-md-6 tr-room-type-list-2">
												<h4>{{ $roomType->name }}</h4>
												<p><b>Description: </b>{{ $roomType->description ?? 'Room description not available.' }}</p>
												<span><b>Capacity: </b>{{ $roomType->capacity ?? '2' }} Persons</span>
											</div>
											<div class="col-md-3 tr-room-type-list-3">
												<span class="hot-list-p3-1">Price Per Night</span>
												<span class="hot-list-p3-2">${{ number_format($roomType->price ?? 0, 2) }}</span>
												<a href="#" class="hot-page2-alp-quot-btn spec-btn-text">Book Now</a>
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
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354805187447!2d144.95373631531556!3d-37.80787097975154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z{{ urlencode($hotel->location) }}!5e0!3m2!1sen!2sin!4v" allowfullscreen></iframe>
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
				</div>

				<!--====== RIGHT SIDEBAR ==========-->
				<div class="col-md-4 tour_rhs">
					<!--====== HOTEL INFO ==========-->
					<div class="tour_right tour_offer">
						<div class="band1"><img src="{{ asset('images/offer.png') }}" alt="" /> </div>
						<p>Hotel Special</p>
						<h4>{{ $hotel->name }}</h4>
						<a href="#contact" class="link-btn">Contact Now</a>
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
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
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

	<!--====== TIPS BEFORE TRAVEL ==========-->
	<section>
		<div class="rows tips tips-home tb-space home_title">
			<div class="container tips_1">
				<!-- TIPS BEFORE TRAVEL -->
				<div class="col-md-4 col-sm-6 col-xs-12">
					<h3>Tips Before Travel</h3>
					<div class="tips_left tips_left_1">
						<h5>Check amenities offered</h5>
						<p>Verify all amenities and services available at the hotel before booking.</p>
					</div>
					<div class="tips_left tips_left_2">
						<h5>Read guest reviews</h5>
						<p>Check previous guest reviews to ensure quality service and facilities.</p>
					</div>
					<div class="tips_left tips_left_3">
						<h5>Plan your stay</h5>
						<p>Book in advance and plan your accommodation according to your needs.</p>
					</div>
				</div>

				<!-- CUSTOMER TESTIMONIALS -->
				<div class="col-md-8 col-sm-6 col-xs-12 testi-2">
					<!-- TESTIMONIAL TITLE -->
					<h3>Customer Testimonials</h3>
					<div class="testi">
						<h4>Guest Review</h4>
						<p>Fantastic experience at this hotel. Great service, comfortable rooms, and excellent staff.</p>
						<address>Satisfied Guest</address>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
