@extends('layouts.master')
@section('content')

	<!--====== HOTELS LIST ==========-->
	<section class="hot-page2-alp hot-page2-pa-sp-top all-hot-bg">
		<div class="container">
			<div class="row inner_banner inner_banner_3 bg-none">
				<div class="hot-page2-alp-tit">
					<h1>Hotel & Restaurants in Vancouver </h1>
					<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide. </p>
					<ul>
						<li><a href="#inner-page-title">Home</a> </li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#inner-page-title" class="bread-acti">Hotels & Restaurants</a> </li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="hot-page2-alp-con">
					<!--LEFT LISTINGS-->
					<div class="col-md-3 hot-page2-alp-con-left">
						<!--PART 1 : LEFT LISTINGS-->
						<div class="hot-page2-alp-con-left-1">
							<h3>Suggesting Hotels</h3> </div>
						<!--PART 2 : LEFT LISTINGS-->
						<div class="hot-page2-hom-pre hot-page2-alp-left-ner-notb">
							<ul>
								<!--LISTINGS by reviews-->
								@forelse($topHotels as $hotel)
									<li>
										<a href="{{ route('hotel.details', $hotel->id) }}">
											<div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="{{ $hotel->image ? asset('uploads/hotels/' . $hotel->image) : asset('assets/templates/images/sight/5.jpg') }}" alt="{{ $hotel->name }}"> </div>
											<div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
												<h5>{{ $hotel->name }}</h5> <span>City: {{ $hotel->location }}</span> </div>
											<div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"> <span>{{ round($hotel->reviews_avg_rating ?? 0, 1) }}</span> </div>
										</a>
									</li>
								@empty
									<li><p style="padding: 20px; color: #999;">No hotels with reviews available.</p></li>
								@endforelse
							</ul>
						</div>
						<!--PART 7 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Filter Hotels</h4>
							<div class="hot-room-ava-check">
							<form method="GET" action="{{ route('hotels') }}" class="package-form">
							<div>
								<div class="form-group">
										<label>Search by Location</label>
										<select name="location" class="chosen-select">
											<option value="">All Locations</option>
											<option value="Any location">Any location</option>
											@foreach($locations as $loc)
												<option value="{{ $loc }}" {{ request('location') === $loc ? 'selected' : '' }}>{{ $loc }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Min Price ($)</label>
										<input type="number" name="min_price" class="form-control" placeholder="Min Price" value="{{ request('min_price') }}" min="0">
									</div>
									<div class="form-group">
										<label>Max Price ($)</label>
										<input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request('max_price') }}" min="0">
									</div>
							</div>
							<button type="submit" class="link-btn" style="width: 100%; margin-top: 10px;">Search Hotels</button>
						</form>
							</div>
						</div>
						
						<!--PART 6 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-star-o" aria-hidden="true"></i> Select Ratings</h4>
							<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
								<form method="GET" action="{{ route('hotels') }}" class="rating-filter-form">
									<!-- Hidden inputs to preserve other filters -->
									<input type="hidden" name="location" value="{{ request('location') }}">
									<input type="hidden" name="min_price" value="{{ request('min_price') }}">
									<input type="hidden" name="max_price" value="{{ request('max_price') }}">
									<ul>
										<li>
											<div class="chbox">
												<input id="chp61" class="styled rating-checkbox" type="checkbox" name="min_rating" value="5" {{ request('min_rating') === '5' ? 'checked' : '' }}>
												<label for="chp61"> <span class="ho-hot-rat-star-list">
                                                        <span class="hot-list-left-part-rat">5.0</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> </span>
												</label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp62" class="styled rating-checkbox" type="checkbox" name="min_rating" value="4" {{ request('min_rating') === '4' ? 'checked' : '' }}>
												<label for="chp62"> <span class="ho-hot-rat-star-list">
                                                        <span class="hot-list-left-part-rat">4.0</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </span>
												</label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp63" class="styled rating-checkbox" type="checkbox" name="min_rating" value="3" {{ request('min_rating') === '3' ? 'checked' : '' }}>
												<label for="chp63"> <span class="ho-hot-rat-star-list">
                                                        <span class="hot-list-left-part-rat">3.0</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </span>
												</label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp64" class="styled rating-checkbox" type="checkbox" name="min_rating" value="2" {{ request('min_rating') === '2' ? 'checked' : '' }}>
												<label for="chp64"> <span class="ho-hot-rat-star-list">
                                                        <span class="hot-list-left-part-rat">2.0</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </span>
												</label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp65" class="styled rating-checkbox" type="checkbox" name="min_rating" value="1" {{ request('min_rating') === '1' ? 'checked' : '' }}>
												<label for="chp65"> <span class="ho-hot-rat-star-list">
                                                        <span class="hot-list-left-part-rat">1.0</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </span>
												</label>
											</div>
										</li>
									</ul>
								</form>
								<script>
									document.querySelectorAll('.rating-checkbox').forEach(checkbox => {
										checkbox.addEventListener('change', function() {
											document.querySelector('.rating-filter-form').submit();
										});
									});
								</script>
							</div>
						</div>
						<!--END PART 5 : LEFT LISTINGS-->
						<!--PART 6 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-heart-o" aria-hidden="true"></i> Hotel Amenities</h4>
							<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
								<form>
									<ul>
										<li>
											<div class="chbox">
												<input id="chp1" type="checkbox" checked="">
												<label for="chp1"> Swimming pools </label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp2" type="checkbox">
												<label for="chp2"> Wi-Fi & Computer </label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp3" type="checkbox">
												<label for="chp3"> Kitchen facilities </label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp4" type="checkbox">
												<label for="chp4"> Music & GYM </label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp5" type="checkbox">
												<label for="chp5"> Dining </label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp6" type="checkbox">
												<label for="chp6"> Cab </label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp7" type="checkbox">
												<label for="chp7"> Breakfast free </label>
											</div>
										</li>
									</ul>
								</form> </div>
						</div>
						<!--END PART 7 : LEFT LISTINGS-->
					</div>
					<!--END LEFT LISTINGS-->
					<!--RIGHT LISTINGS-->
					<div class="col-md-9 hot-page2-alp-con-right">
						<div class="hot-page2-alp-con-right-1">
							<!--LISTINGS-->
							<div class="row">
								<!--LISTINGS START-->
								@foreach ($hotels as $hotel)
									
								
								<div class="hot-page2-alp-r-list">
									<div class="col-md-3 hot-page2-alp-r-list-re-sp">
										<a href="{{ route('hotel.details', $hotel->id) }}">
											@php
												$minPrice = $hotel->roomTypes()->min('price') ?? 0;
												$avgRating = round($hotel->reviews()->avg('rating') ?? 3.5);
											@endphp
											<div class="hotel-list-score">{{ $avgRating }}</div>
											<div class="hot-page2-hli-1"> <img src="{{ asset('uploads/hotels/' . $hotel->image) }}" alt="{{ $hotel->name }}"> </div>
											<div class="hom-hot-av-tic hom-hot-av-tic-list"> Available Rooms: {{ $hotel->roomTypes()->count() }} </div>
										</a>
									</div>
									<div class="col-md-6">
										<div class="hot-page2-alp-ri-p2"> <a href="{{ route('hotel.details', $hotel->id) }}"><h3>{{ $hotel->name }}</h3></a>
											<ul>
												<li>{{ $hotel->location }}</li>
												<li>{{ $hotel->phone ?? 'N/A' }}{{ $hotel->mobile ? ', ' . $hotel->mobile : '' }}</li>
											</ul>
										</div>
									</div>
									<div class="col-md-3">
										<div class="hot-page2-alp-ri-p3">
											<div class="hot-page2-alp-r-hot-page-rat">10% Off</div> <span class="hot-list-p3-1">Price Per Night</span> <span class="hot-list-p3-2">${{ number_format($minPrice, 2) }}</span><span class="hot-list-p3-4">
												<a href="{{ route('hotel.details', $hotel->id) }}" class="hot-page2-alp-quot-btn">Book Now</a>
											</span> </div>
									</div>
								</div>
								@endforeach
								<!--END LISTINGS-->
					
														
							</div>
						</div>
					</div>
					<!--END RIGHT LISTINGS-->
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