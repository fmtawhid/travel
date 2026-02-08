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
								<!--LISTINGS-->
								<li>
									<a href="hotel-details.html">
										<div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="images/hotels/1.jpg" alt=""> </div>
										<div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
											<h5>Taaj Club House</h5> <span>City: illunois, United States</span> </div>
										<div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"> <span>4.2</span> </div>
									</a>
								</li>
								<!--LISTINGS-->
								<li>
									<a href="hotel-details.html">
										<div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="images/hotels/2.jpg" alt=""> </div>
										<div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
											<h5>Lake Palace view Hotel</h5> <span>City: Beijing,China</span> </div>
										<div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"> <span>4.4</span> </div>
									</a>
								</li>
								<!--LISTINGS-->
								<li>
									<a href="hotel-details.html">
										<div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="images/hotels/3.jpg" alt=""> </div>
										<div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
											<h5>First Class Grandd Hotel</h5> <span>City: Berlin,Germany</span> </div>
										<div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"> <span>5.0</span> </div>
									</a>
								</li>
								<!--LISTINGS-->
								<li>
									<a href="hotel-details.html">
										<div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="images/hotels/4.jpg" alt=""> </div>
										<div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
											<h5>Barcelona Grand Pales</h5> <span>City: Chennai,India</span> </div>
										<div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"> <span>3.0</span> </div>
									</a>
								</li>
								<!--LISTINGS-->
								<li>
									<a href="hotel-details.html">
										<div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="images/hotels/8.jpg" alt=""> </div>
										<div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
											<h5>Universal luxury Grand Hotel</h5> <span>City: Rio,Brazil</span> </div>
										<div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"> <span>3.4</span> </div>
									</a>
								</li>
							</ul>
						</div>
						<!--PART 7 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Travel Available Check</h4>
							<div class="hot-room-ava-check">
							<form class="package-form">
							<div>
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
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Min Price</label>
									<select class="chosen-select">
										<option value="" disabled selected>Min</option>
										<option value="1">$200</option>
										<option value="2">$500</option>
										<option value="3">$1000</option>
										<option value="1">$5000</option>
										<option value="1">$10,000</option>
										<option value="1">$50,000</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label>Max Price</label>
									<select class="chosen-select">
										<option value="" disabled selected>Max</option>
										<option value="1">$200</option>
										<option value="2">$500</option>
										<option value="3">$1000</option>
										<option value="1">$5000</option>
										<option value="1">$10,000</option>
										<option value="1">$50,000</option>
									</select>
								</div>								
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Check in</label>
									<input type="text" class="form-control datepicker" name="from" placeholder="Select date">
								</div>
								<div class="form-group col-md-6">
									<label>Check out</label>
									<input type="text" class="form-control datepicker" name="to" placeholder="Select date">
								</div>
							</div>
						</form>
							</div>
						</div>
						
						<!--PART 6 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-star-o" aria-hidden="true"></i> Select Ratings</h4>
							<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
								<form>
									<ul>
										<li>
											<div class="chbox">
												<input id="chp61" class="styled" type="checkbox" checked="">
												<label for="chp61"> <span class="ho-hot-rat-star-list">
                                                        <span class="hot-list-left-part-rat">5.0</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> </span>
												</label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp62" class="styled" type="checkbox">
												<label for="chp62"> <span class="ho-hot-rat-star-list">
                                                        <span class="hot-list-left-part-rat">4.0</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </span>
												</label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp63" class="styled" type="checkbox">
												<label for="chp63"> <span class="ho-hot-rat-star-list">
                                                        <span class="hot-list-left-part-rat">3.0</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </span>
												</label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp64" class="styled" type="checkbox">
												<label for="chp64"> <span class="ho-hot-rat-star-list">
                                                        <span class="hot-list-left-part-rat">2.0</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </span>
												</label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp65" class="styled" type="checkbox">
												<label for="chp65"> <span class="ho-hot-rat-star-list">
                                                        <span class="hot-list-left-part-rat">1.0</span> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </span>
												</label>
											</div>
										</li>
									</ul>
								</form>
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
											<div class="hotel-list-score">{{ rand(3, 5) }}</div>
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
											<div class="hot-page2-alp-r-hot-page-rat">10% Off</div> <span class="hot-list-p3-1">Price Per Night</span> <span class="hot-list-p3-2">${{ rand(100, 500) }}</span><span class="hot-list-p3-4">
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