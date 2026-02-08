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
											<input type="text" class="form-control datepicker" name="from"
												placeholder="Check in">
										</div>
									</li>
									<li class="sr-date">
										<div class="form-group">
											<label>Check out</label>
											<input type="text" class="form-control datepicker" name="to"
												placeholder="Check out">
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
	<section class="hot-page2-alp hot-page2-pa-sp-top">
		<div class="container">
			<div class="row inner_banner bg-none">
				<div class="hot-page2-alp-tit">
					<h1>Travel Packages</h1>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide. </p>
					<ul>
						<li><a href="#inner-page-title">Home</a> </li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#inner-page-title" class="bread-acti">All Packages</a> </li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="hot-page2-alp-con">
					<!--LEFT LISTINGS-->
					<div class="col-md-3 hot-page2-alp-con-left">
						<!--PART 1 : LEFT LISTINGS-->
						<div class="hot-page2-alp-con-left-1">
							<h3>Suggesting Packages</h3>
						</div>
						<!--PART 2 : LEFT LISTINGS-->
						<div class="hot-page2-hom-pre hot-page2-alp-left-ner-notb">
							<ul>
								<!--LISTINGS-->
								@foreach ($suggestedTours as $tour)
									
								
								<li>
									<a href="{{ route('package.details', $tour->id) }}">
										<div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img
												src="{{ asset('uploads/tours/' . $tour->image) }}" alt=""> </div>
										<div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
											<h5>{{ $tour->title }}</h5> <span>{{ $tour->location }}</span>
										</div>
										<div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"> <span>{{ $tour->duration }}</span> </div>
									</a>
								</li>
								@endforeach
							</ul>
						</div>
						<!--PART 7 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Travel Available Check</h4>
							<div class="hot-room-ava-check">
								<form method="GET" action="{{ route('packages') }}" class="package-form">
									<div>
										<div class="form-group">
											<label>Your destination</label>
											<select name="location" class="chosen-select">
												<option value="">Any location</option>
												@if(isset($locations))
													@foreach($locations as $location)
														<option value="{{ $location }}" @if(request('location') === $location)
														selected @endif>{{ $location }}</option>
													@endforeach
												@endif
											</select>
										</div>
										<div class="form-group">
											<label>Package</label>
											<select name="package_id" class="chosen-select">
												<option value="any">Any Package</option>

												@if(isset($packageTypes))
													@foreach($packageTypes as $package)
														<option value="{{ $package->id }}"
															@if(request('package_id') == $package->id) selected @endif>
															{{ $package->name }}
														</option>
													@endforeach
												@endif

											</select>
										</div>

									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label>Min Price</label>
											<input type="number" name="min_price" class="form-control" placeholder="Min"
												value="{{ request('min_price') }}">
										</div>
										<div class="form-group col-md-6">
											<label>Max Price</label>
											<input type="number" name="max_price" class="form-control" placeholder="Max"
												value="{{ request('max_price') }}">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label>Check in</label>
											<input type="date" class="form-control" name="check_in"
												value="{{ request('check_in') }}">
										</div>
										<div class="form-group col-md-6">
											<label>Check out</label>
											<input type="date" class="form-control" name="check_out"
												value="{{ request('check_out') }}">
										</div>
									</div>
									{{-- preserve includes if any when submitting this form --}}
									@if(request('includes'))
										@foreach((array) request('includes') as $inc)
											<input type="hidden" name="includes[]" value="{{ $inc }}">
										@endforeach
									@endif
									<div class="row" style="margin-top:10px;">
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary btn-block">Search</button>
											<a href="{{ route('packages') }}" class="btn btn-secondary btn-block"
												style="margin-top: 10px;">Reset Filters</a>
										</div>
									</div>
								</form>
							</div>
						</div>

						<!--PART 6 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-heart-o" aria-hidden="true"></i> Travel Amenities</h4>
							<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
								<form method="GET" action="{{ route('packages') }}">
									{{-- preserve other filters when applying amenities --}}
									<input type="hidden" name="location" value="{{ request('location') }}">
									<input type="hidden" name="package_type" value="{{ request('package_type') }}">
									<input type="hidden" name="min_price" value="{{ request('min_price') }}">
									<input type="hidden" name="max_price" value="{{ request('max_price') }}">
									<input type="hidden" name="check_in" value="{{ request('check_in') }}">
									<input type="hidden" name="check_out" value="{{ request('check_out') }}">
									<ul>
										<li>
											<div class="chbox">
												<input id="chp1" name="includes[]" type="checkbox" value="sightseeing"
													@if(in_array('sightseeing', (array) request('includes', []))) checked
													@endif>
												<label for="chp1"> Sightseeing </label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp2" name="includes[]" type="checkbox" value="hotel"
													@if(in_array('hotel', (array) request('includes', []))) checked @endif>
												<label for="chp2"> Hotel </label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp3" name="includes[]" type="checkbox" value="transfer"
													@if(in_array('transfer', (array) request('includes', []))) checked
													@endif>
												<label for="chp3"> Transfer </label>
											</div>
										</li>
										<li>
											<div class="chbox">
												<input id="chp4" name="includes[]" type="checkbox" value="luggage"
													@if(in_array('luggage', (array) request('includes', []))) checked @endif>
												<label for="chp4"> Luggage </label>
											</div>
										</li>
									</ul>
									<button type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;">Apply
										Filters</button>
								</form>
							</div>
						</div>
						<!--END PART 7 : LEFT LISTINGS-->
						<!--PART 6 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-heart-o" aria-hidden="true"></i> Send your enquiry</h4>
							<div class="hot-room-ava-check form-out-box">
								<form class="contact__form v2-search-form package-form" method="post"
									action="mail/enquiry.php">
									<div class="alert alert-success contact__msg" role="alert">
										Thank you message
									</div>
									<div>
										<div class="form-group">
											<label for="name">Name:</label>
											<input type="text" class="form-control" placeholder="Enter name*" name="name"
												required>
										</div>
										<div class="form-group">
											<label for="email">Email:</label>
											<input type="email" class="form-control" placeholder="Enter email*" name="email"
												required>
										</div>
										<div class="form-group">
											<label for="phone">Phone:</label>
											<input type="number" class="form-control" placeholder="Enter phone*"
												name="phone" required>
										</div>
										<div>
											<button type="submit" class="btn btn-primary" id="send_button">Submit</button>
										</div>
									</div>
								</form>
							</div>
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
								@forelse($tours as $tour)
									<div class="hot-page2-alp-r-list">
										<div class="col-md-3 hot-page2-alp-r-list-re-sp">
											<a href="{{ route('package.details', $tour->id) }}">
												<div class="hotel-list-score">{{ $tour->rating ?? '4.0' }}</div>
												<div class="hot-page2-hli-1"> <img
														src="{{ asset('uploads/tours/' . $tour->image) }}"
														alt="{{ $tour->title }}"> </div>
											</a>
										</div>
										<div class="col-md-6">
											<div class="trav-list-bod">
												<a href="{{ route('package.details', $tour->id) }}">
													<h3>{{ $tour->title }}</h3>
												</a>
												<p>{{ $tour->short_description }}</p>
											</div>
										</div>
										<div class="col-md-3">
											<div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">

												{{-- Discount % --}}
												@if($tour->discount_price && $tour->price)
													@php
														$discount = round((($tour->price - $tour->discount_price) / $tour->price) * 100);
													@endphp
													<div class="hot-page2-alp-r-hot-page-rat">{{ $discount }}% Off</div>
												@endif

												<span class="hot-list-p3-1">Prices Starting</span>

												{{-- Price display --}}
												<span class="hot-list-p3-2">
													${{ $tour->discount_price ?? $tour->price }}
												</span>

												<span class="hot-list-p3-4">
													<a href="{{ route('package.details', $tour->id) }}"
														class="hot-page2-alp-quot-btn">Book Now</a>
												</span>

											</div>
										</div>

										<div>
											<div class="trav-ami">
												<h4>Detail and Includes</h4>
												<ul>
													@if($tour->include_sightseeing)
														<li><img src="{{ asset('images/icon/a14.png') }}" alt="">
															<span>Sightseeing</span>
														</li>
													@endif
													@if($tour->include_hotel)
														<li><img src="{{ asset('images/icon/a15.png') }}" alt=""> <span>Hotel</span>
														</li>
													@endif
													@if($tour->include_transfer)
														<li><img src="{{ asset('images/icon/a16.png') }}" alt="">
															<span>Transfer</span>
														</li>
													@endif
													@if($tour->include_luggage)
														<li><img src="{{ asset('images/icon/a17.png') }}" alt="">
															<span>Luggage</span>
														</li>
													@endif
													<li><img src="{{ asset('images/icon/a18.png') }}" alt=""> <span>Duration
															{{ $tour->duration }}</span></li>
													<li><img src="{{ asset('images/icon/a19.png') }}" alt=""> <span>Location :
															{{ $tour->location }}</span></li>
													<li><img src="{{ asset('images/icon/dbl4.png') }}" alt=""> <span>Stay
															Plan</span></li>
												</ul>
											</div>
										</div>
									</div>
								@empty
									<div class="col-md-12">
										<h3>No tours available</h3>
									</div>
								@endforelse
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
						<p>Ut sed sem quis magna ultricies lacinia et sed tortor. Ut non tincidunt nisi, non elementum
							lorem. Aliquam gravida sodales</p>
						<address>Illinois, United States of America</address>
					</div>
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