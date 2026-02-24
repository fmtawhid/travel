@extends('layouts.master')
@section('content')

	<!--====== REQUEST A QUOTE ==========-->
	<section>
        <div class="tb-space cus-pack-form">
            <div class="rows container">
                <div class="spe-title cus-title">
                    <h2>Book your <span>Custom Package</span> Now!</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
                </div>
                <div class="cus-book-form form_1">
						<form class="contact__form v2-search-form" method="post" action="{{ route('booking.custom-package.store') }}">
							@csrf
							<div class="alert alert-success contact__msg" style="display: none" role="alert">
								Thank you for arranging a wonderful trip for us! Our team will contact you shortly!
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text"  class="validate" name="name" placeholder="Enter your name" value="{{ auth()->user()?->name ?? '' }}" required>
									<label>Enter your name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input type="number"  class="validate" name="phone" placeholder="Enter your phone" value="{{ auth()->user()?->phone ?? '' }}" required>
									<label>Enter your phone</label>
								</div>
								<div class="input-field col s6">
									<input type="email"  class="validate" name="email" placeholder="Enter your email" value="{{ auth()->user()?->email ?? '' }}" required>
									<label>Enter your email</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="number" name="howmanytravellers" id="howmanytravellers" min="1">
									<label for="howmanytravellers">How many travellers?</label>
								</div>
							</div>
							
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="city" id="city">
									<label for="city">Enter City or Place</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input type="text" class="datepicker" name="arrival" readonly>
									<label for="from">Arrival Date</label>
								</div>
								<div class="input-field col s6">
									<input type="text" class="datepicker" name="departure" readonly>
									<label for="to">Departure Date</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input type="number" name="noofadults" id="noofadults" min="1" placeholder="No of adults">
									<label for="noofadults">No of adults</label>
								</div>
								<div class="input-field col s6">
									<input type="number" name="noofchildrens" id="noofchildrens" min="0" placeholder="No of childrens">
									<label for="noofchildrens">No of childrens</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input type="number" name="minprice" id="minprice" placeholder="Min Price" min="0">
									<label for="minprice">Min Price</label>
								</div>
								<div class="input-field col s6">
									<input type="number" name="maxprice" id="maxprice" placeholder="Max Price" min="0">
									<label for="maxprice">Max Price</label>
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
    </section>

@endsection