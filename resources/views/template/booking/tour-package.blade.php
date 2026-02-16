@extends('layouts.master')
@section('content')

	
	<!--HEADER SECTION-->
	<section>
		<div class="v2-hom-search">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
					<div class="v2-ho-se-ri">
						<h5>World's leading tour and travels template</h5>
						<h1>Tour Package booking now!</h1>
						<p>Experience the various exciting tour and travel packages and Make hotel reservations, find vacation packages, search cheap hotels and events</p>
						<div class="ban-shrt-cut-link">
							<ul>
								<li>
									<a href="{{ route('booking.tour-package') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{ asset('assets/templates/images/icon/2.png') }}" alt=""> Tour</a>
								</li>
								<li>
									<a href="{{ route('booking.flight') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{ asset('assets/templates/images/icon/31.png') }}" alt=""> Flight</a>
								</li>
								<li>
									<a href="{{ route('booking.car') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{ asset('assets/templates/images/icon/30.png') }}" alt=""> Car Rentals</a>
								</li>
								<li>
									<a href="{{ route('booking.hotel') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{ asset('assets/templates/images/icon/1.png') }}" alt=""> Hotel</a>
								</li>								
							</ul>
						</div>
					</div>						
					</div>	
					<div class="col-md-6">
					<div class="">
						<form class="contact__form v2-search-form book-tab-form" method="post" action="mail/tourbooking.php">
							<div class="alert alert-success contact__msg" style="display: none" role="alert">
								Thank you message
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text"  class="validate" name="name" placeholder="Enter your name" required>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input type="number"  class="validate" name="phone" placeholder="Enter your phone" required>
								</div>
								<div class="input-field col s6">
									<input type="email"  class="validate" name="email" placeholder="Enter your email" required>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<select name="city" class="chosen-select" id="select-city-1">
										<option value="" disabled selected>Your destination</option>
										<option>Any location</option>
										<option>Chennai</option>
										<option>New york</option>
										<option>Perth</option>
										<option>London</option>
									</select>
								</div>
								<div class="input-field col s12">
									<select name="package" class="chosen-select">
										<option value="" disabled selected>Select your package</option>
										<option value="Honeymoon Package">Honeymoon Package</option>
										<option value="Family Package">Family Package</option>
										<option value="Holiday Package">Holiday Package</option>
										<option value="Group Package">Group Package</option>
										<option value="Regular Package">Regular Package</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input type="text" class="datepicker" name="arrival" readonly placeholder="Arrival Date">
								</div>
								<div class="input-field col s6">
									<input type="text"  class="datepicker" name="departure" readonly placeholder="Departure Date">
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<select name="noofadults" class="chosen-select">
										<option value="" disabled selected>No of adults</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
								</div>
								<div class="input-field col s6">
									<select name="noofchildrens" class="chosen-select">
										<option value="" disabled selected>No of childrens</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>											
									</select>
								</div>
							</div>							

							<div class="row">
								<div class="input-field col s6">
									<select name="minprice" class="chosen-select">
										<option value="" disabled selected>Min Price</option>
										<option value="$200">$200</option>
										<option value="$500">$500</option>
										<option value="$1000">$1000</option>
										<option value="$5000">$5000</option>
										<option value="$10,000">$10,000</option>
										<option value="$50,000">$50,000</option>
									</select>
								</div>
								<div class="input-field col s6">
									<select name="maxprice" class="chosen-select">
										<option value="" disabled selected>Max Price</option>
										<option value="$200">$200</option>
										<option value="$500">$500</option>
										<option value="$1000">$1000</option>
										<option value="$5000">$5000</option>
										<option value="$10,000">$10,000</option>
										<option value="$50,000">$50,000</option>
									</select>
								</div>								
							</div>							
							<div class="row">
								<div class="input-field col s12">
									<input type="submit" value="Book Now" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
								</div>
							</div>
						</form>
					</div>						
					</div>				
				</div>
			</div>
		</div>
	</section>

@endsection