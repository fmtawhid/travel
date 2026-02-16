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
							<h1>Car Rentals easy now!</h1>
							<p>Experience the various exciting tour and travel packages and Make hotel reservations, find
								vacation packages, search cheap hotels and events</p>
							<div class="ban-shrt-cut-link">
								<ul>
									<li>
										<a href="{{ route('booking.tour-package') }}"
											class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img
												src="{{ asset('assets/templates/images/icon/2.png') }}" alt=""> Tour</a>
									</li>
									<li>
										<a href="{{ route('booking.flight') }}"
											class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img
												src="{{ asset('assets/templates/images/icon/31.png') }}" alt=""> Flight</a>
									</li>
									<li>
										<a href="{{ route('booking.car') }}"
											class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img
												src="{{ asset('assets/templates/images/icon/30.png') }}" alt=""> Car
											Rentals</a>
									</li>
									<li>
										<a href="{{ route('booking.hotel') }}"
											class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img
												src="{{ asset('assets/templates/images/icon/1.png') }}" alt=""> Hotel</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="">
							<form class="contact__form v2-search-form book-tab-form" method="post"
								action="mail/carbooking.php">
								<div class="alert alert-success contact__msg" style="display: none" role="alert">
									Thank you message
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="text" class="validate" name="name" placeholder="Enter your name"
											required>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input type="number" class="validate" name="phone" placeholder="Enter your phone"
											required>
									</div>
									<div class="input-field col s6">
										<input type="email" class="validate" name="email" placeholder="Enter your email"
											required>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<select name="city" class="chosen-select" id="select-city">
											<option value="" disabled selected>Pick up location</option>
											<option>Any location</option>
											<option>Chennai</option>
											<option>New york</option>
											<option>Perth</option>
											<option>London</option>
										</select>
									</div>
									<div class="input-field col s12">
										<select name="city" class="chosen-select" id="select-city-1">
											<option value="" disabled selected>Dropping off location</option>
											<option>Any location</option>
											<option>Chennai</option>
											<option>New york</option>
											<option>Perth</option>
											<option>London</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input type="text" class="datepicker" name="pickdate" placeholder="Pick up date">
									</div>
									<div class="input-field col s6">
										<select class="chosen-select" name="picktime">
											<option value="" disabled selected>Pick up time</option>
											<option value="24:00 midnight">24:00 midnight</option>
											<option value="01:00 AM">01:00 AM</option>
											<option value="02:00 AM">02:00 AM</option>
											<option value="03:00 AM">03:00 AM</option>
											<option value="04:00 AM">04:00 AM</option>
											<option value="05:00 AM">05:00 AM</option>
											<option value="06:00 AM">06:00 AM</option>
											<option value="07:00 AM">07:00 AM</option>
											<option value="08:00 AM">08:00 AM</option>
											<option value="09:00 AM">09:00 AM</option>
											<option value="10:00 AM">10:00 AM</option>
											<option value="11:00 AM">11:00 AM</option>
											<option value="12:00 noon">12:00 noon</option>
											<option value="13:00 PM">13:00 PM</option>
											<option value="14:00 PM">14:00 PM</option>
											<option value="15:00 PM">15:00 PM</option>
											<option value="16:00 PM">16:00 PM</option>
											<option value="17:00 PM">17:00 PM</option>
											<option value="18:00 PM">18:00 PM</option>
											<option value="19:00 PM">19:00 PM</option>
											<option value="20:00 PM">20:00 PM</option>
											<option value="21:00 PM">21:00 PM</option>
											<option value="22:00 PM">22:00 PM</option>
											<option value="23:00 PM">23:00 PM</option>
											<option value="24:00 midnight">06:00 AM</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input type="text" class="datepicker" name="dropdate" placeholder="Drop off date">
									</div>
									<div class="input-field col s6">
										<select class="chosen-select" name="droptime">
											<option value="" disabled selected>Drop off time</option>
											<option value="24:00 midnight">24:00 midnight</option>
											<option value="01:00 AM">01:00 AM</option>
											<option value="02:00 AM">02:00 AM</option>
											<option value="03:00 AM">03:00 AM</option>
											<option value="04:00 AM">04:00 AM</option>
											<option value="05:00 AM">05:00 AM</option>
											<option value="06:00 AM">06:00 AM</option>
											<option value="07:00 AM">07:00 AM</option>
											<option value="08:00 AM">08:00 AM</option>
											<option value="09:00 AM">09:00 AM</option>
											<option value="10:00 AM">10:00 AM</option>
											<option value="11:00 AM">11:00 AM</option>
											<option value="12:00 noon">12:00 noon</option>
											<option value="13:00 PM">13:00 PM</option>
											<option value="14:00 PM">14:00 PM</option>
											<option value="15:00 PM">15:00 PM</option>
											<option value="16:00 PM">16:00 PM</option>
											<option value="17:00 PM">17:00 PM</option>
											<option value="18:00 PM">18:00 PM</option>
											<option value="19:00 PM">19:00 PM</option>
											<option value="20:00 PM">20:00 PM</option>
											<option value="21:00 PM">21:00 PM</option>
											<option value="22:00 PM">22:00 PM</option>
											<option value="23:00 PM">23:00 PM</option>
											<option value="24:00 midnight">06:00 AM</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<select class="chosen-select" name="selectcar">
											<option value="" disabled selected>Select car type</option>
											<option value="Micro">Micro</option>
											<option value="Mini">Mini</option>
											<option value="Prime">Prime</option>
											<option value="Prime SUV">Prime SUV</option>
											<option value="Luxury Cars">Luxury Cars</option>
											<option value="Mini Van">Mini Van</option>
											<option value="Small Bus">Small Bus</option>
											<option value="Luxury Bus">Luxury Bus</option>
										</select>
									</div>
									<div class="input-field col s6">
										<select class="chosen-select" name="totalpassangers">
											<option value="" disabled selected>Total passengers</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="10">10</option>
											<option value="15">15</option>
											<option value="20">20</option>
											<option value="50">50</option>
											<option value="100">100</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<select class="chosen-select" name="noofadults">
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
										<select class="chosen-select" name="noofchildrens">
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
										<select class="chosen-select" name="minprice">
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
										<select class="chosen-select" name="maxprice">
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
										<input type="submit" value="Book Now"
											class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END HEADER SECTION-->
	
@endsection