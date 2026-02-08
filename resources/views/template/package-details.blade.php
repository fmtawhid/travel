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
                                                <option>WeekEnd Package</option>
                                                <option>Regular Package</option>
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
						<li class="dl2">Price : ${{ $tour->price }}</li>
						<li class="dl3">Duration : {{ $tour->duration }}</li>
						<li class="dl4"><a href="booking.html">Book Now</a> </li>
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
						<h2>{{ $tour->title }} <span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span><span class="tour_rat">{{ $tour->rating ?? '4.0' }}</span></h2> </div>
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
							<li data-target="#myCarousel1" data-slide-to="{{ $key }}"><img src="{{ asset('uploads/tours/gallery/'.$gallery->image) }}" alt="{{ $tour->title }}">
								</li>
								@empty
								<li data-target="#myCarousel1" data-slide-to="0"><img src="images/gallery/placeholder.jpg" alt="No Gallery">
								</li>
								@endforelse
							</ol>
							<!-- Wrapper for slides -->
							<div class="carousel-inner carousel-inner1" role="listbox">
								@forelse($galleries as $key => $gallery)
							<div class="item @if($key == 0) active @endif"> <img src="{{ asset('uploads/tours/gallery/'.$gallery->image) }}" alt="{{ $tour->title }}" width="460" height="345"> </div>
								@empty
								<div class="item active"> <img src="images/gallery/placeholder.jpg" alt="No Gallery Available" width="460" height="345"> </div>
								@endforelse
							</div>
							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
							<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span> </a>
						</div>
					</div>
					<!--====== TOUR LOCATION ==========-->
					<div class="tour_head1 tout-map map-container">
						<h3>Location</h3>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290415.157581651!2d-93.99661009218904!3d39.661150926343694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1467884030780" allowfullscreen></iframe>
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
								<td>{{ $tour->start_date ? \Carbon\Carbon::parse($tour->start_date)->format('M d, Y') : '-' }}</td>
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
							<li class="l-info-pack-plac"><p>No Itinerary Available</p></li>
							@endforelse
						</ul>
					</div>
					<div>
						<div class="dir-rat">
							<div class="dir-rat-inn dir-rat-title">
								<h3>Write Your Rating Here</h3>
								<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
								<fieldset class="rating">
									<input type="radio" id="star5" name="rating" value="5" />
									<label class="full" for="star5" title="Awesome - 5 stars"></label>
									<input type="radio" id="star4half" name="rating" value="4 and a half" />
									<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
									<input type="radio" id="star4" name="rating" value="4" />
									<label class="full" for="star4" title="Pretty good - 4 stars"></label>
									<input type="radio" id="star3half" name="rating" value="3 and a half" />
									<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
									<input type="radio" id="star3" name="rating" value="3" />
									<label class="full" for="star3" title="Meh - 3 stars"></label>
									<input type="radio" id="star2half" name="rating" value="2 and a half" />
									<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
									<input type="radio" id="star2" name="rating" value="2" />
									<label class="full" for="star2" title="Kinda bad - 2 stars"></label>
									<input type="radio" id="star1half" name="rating" value="1 and a half" />
									<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
									<input type="radio" id="star1" name="rating" value="1" />
									<label class="full" for="star1" title="Sucks big time - 1 star"></label>
									<input type="radio" id="starhalf" name="rating" value="half" />
									<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
								</fieldset>
							</div>
							<div class="dir-rat-inn">
								<form class="dir-rat-form">
									<div class="form-group col-md-6 pad-left-o">
										<input type="text" class="form-control" id="email11" placeholder="Enter Name"> </div>
									<div class="form-group col-md-6 pad-left-o">
										<input type="number" class="form-control" id="email12" placeholder="Enter Mobile"> </div>
									<div class="form-group col-md-6 pad-left-o">
										<input type="email" class="form-control" id="email13" placeholder="Enter Email id"> </div>
									<div class="form-group col-md-6 pad-left-o">
										<input type="text" class="form-control" id="email14" placeholder="Enter your City"> </div>
									<div class="form-group col-md-12 pad-left-o">
										<textarea placeholder="Write your message"></textarea>
									</div>
									<div class="form-group col-md-12 pad-left-o">
										<input type="submit" value="SUBMIT" class="link-btn"> </div>
								</form>
							</div>
							<!--COMMENT RATING-->
							@forelse($reviews as $review)
							<div class="dir-rat-inn dir-rat-review">
								<div class="row">
									<div class="col-md-3 dir-rat-left"> <img src="{{ asset('images/reviewer/default.jpg') }}" alt="">
										<p>{{ $review->user_name ?? 'Anonymous' }} <span>{{ $review->created_at->format('d F, Y') }}</span> </p>
									</div>
									<div class="col-md-9 dir-rat-right">
										<div class="dir-rat-star">
											@for($i = 1; $i <= 5; $i++)
												<i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}" aria-hidden="true"></i>
											@endfor
										</div>
										<p>{{ $review->comment }}</p>
										<ul>
											<li><a href="#"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
										</ul>
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
				</div>
				<div class="col-md-4 tour_rhs">
					<!--====== SPECIAL OFFERS ==========-->
					<div class="tour_right tour_offer">
						<div class="band1"><img src="images/offer.png" alt="" /> </div>
						@if($tour->discount_percentage && $tour->discount_percentage > 0)
						<p>Special Offer</p>
						<h4>${{ $tour->discount_price ?? $tour->price }}<span class="n-td">
								<span class="n-td-1">${{ $tour->price }}</span>
								</span>
							</h4>
						@else
						<h4>${{ $tour->price }}</h4>
						@endif
						<a href="booking.html" class="link-btn">Book Now</a> </div>
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
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
						</ul>
					</div>
					<!--====== HELP PACKAGE ==========-->
					<div class="tour_right head_right tour_help tour-ri-com">
						<h3>Help & Support</h3>
						<div class="tour_help_1">
							<h4 class="tour_help_1_call">Call Us Now</h4>
							<h4><i class="fa fa-phone" aria-hidden="true"></i> 10-800-123-000</h4> </div>
					</div>
					<!--====== PUPULAR TOUR PACKAGES ==========-->
					<div class="tour_right tour_rela tour-ri-com">
						<h3>Popular Packages</h3>
						<div class="tour_rela_1"> <img src="images/related1.png" alt="" />
							<h4>Dubai 7Days / 6Nights</h4>
							<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
						<div class="tour_rela_1"> <img src="images/related2.png" alt="" />
							<h4>Mauritius 4Days / 3Nights</h4>
							<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
						<div class="tour_rela_1"> <img src="images/related3.png" alt="" />
							<h4>India 14Days / 13Nights</h4>
							<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
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
								<a href="#"><img src="images/Location-Manager.png" alt=""> </a>
							</li>
							<!-- PRIVATE GUIDE -->
							<li>
								<a href="#"><img src="images/Private-Guide.png" alt=""> </a>
							</li>
							<!-- ARRANGEMENTS -->
							<li>
								<a href="#"><img src="images/Arrangements.png" alt=""> </a>
							</li>
							<!-- EVENT ACTIVITIES -->
							<li>
								<a href="#"><img src="images/Events-Activities.png" alt=""> </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
