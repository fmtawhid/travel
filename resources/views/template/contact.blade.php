@extends('layouts.master')
@section('content')

	<!--====== LOCATON ==========-->
	<section>
		<div class="rows contact-map map-container">
			<iframe
				src="https://www.google.com/maps?q={{ urlencode($settings->location) }}&output=embed"
				width="100%"
				height="450"
				style="border:0;"
				allowfullscreen
				loading="lazy">
			</iframe>
		</div>
	</section>

		<!--====== FAQ ==========-->
	<section>
		<div class="form form-spac rows">
			<div class="container">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2>Frequency Asked <span>Questions</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 form_1 faq-form wow fadeInLeft" data-wow-duration="1s">
					<!--====== THANK YOU MESSAGE ==========-->
					@if($message = Session::get('success'))
					<div class="alert alert-success contact__msg" role="alert">
						{{ $message }}
					</div>
					@endif
					@if($message = Session::get('error'))
					<div class="alert alert-danger contact__msg" role="alert">
						{{ $message }}
					</div>
					@endif
					<form class="contact__form v2-search-form" method="post" action="{{ route('store-contact') }}">
						@csrf
						<ul>
							<li>
								<input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required> 
								@error('name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</li>
							<li>
								<input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Mobile" required>
								@error('phone')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</li>
							<li>
								<input type="email" name="email" value="{{ old('email') }}" placeholder="Email id" required>
								@error('email')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</li>
							{{-- <li>
								<input type="text" name="city" value="{{ old('city') }}" placeholder="City" required>
								@error('city')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</li> --}}
							<li>
								<input type="text" name="country" value="{{ old('country') }}" placeholder="Country" required>
								@error('country')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</li>
							<li>
								<textarea name="message" cols="40" rows="3" placeholder="Enter your message" required>{{ old('message') }}</textarea>
								@error('message')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</li>
							<li>
								<input type="submit" value="Submit" id="send_button"> </li>
						</ul>
					</form>
				</div>
				<!--====== COMMON NOTICE ==========-->
				<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1s">
					<div class="rows book_poly">
						<h3>Common Notice</h3>
						<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
						<ul>
							<li>But the majority have suffered alteration in some form, by injected humour</li>
							<li>All the Lorem Ipsum generators on the Internet tend to repeat</li>
							<li>The generated Lorem Ipsum is therefore always free from repetition</li>
							<li>Proof : Id proof mandatory for tour travel</li>
							<li>available, but the majority have suffered alteration in some form</li>
							<li>It has survived not only five centuries, but also the leap</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== QUICK ENQUIRY FORM ==========-->
	<section>
		<div class="form form-spac rows con-page">
			<div class="container">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2><span>Contact us</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>

		<div class="pg-contact">
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con1">
                            <h2>The <span>Travel</span></h2>
                            <p>We Provide Outsourced Software Development Services To Over 50 Clients From 21 Countries.</p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con1"> <img src="img/contact/1.png" alt="">
                            <h4>Address</h4>
                            <p>{{ $settings->location }} </p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con3"> <img src="img/contact/2.png" alt="">
                            <h4>CONTACT INFO:</h4>
                            <p> <a href="tel://0099999999" class="contact-icon">Phone: {{ $settings->phone }}</a>
                                <br> <a href="mailto:mytestmail@gmail.com" class="contact-icon">Email: {{ $settings->email }}</a> </p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con4"> <img src="{{ asset('assets/templates/img/contact/3.png') }}" alt="">
                            <h4>Website</h4>
                            <p> <a href="#">Facebook: {{ $settings->facebook }}</a>
                                <br> <a href="#">Twitter: {{ $settings->x }}</a>
								<br> <a href="#">Instagram: {{ $settings->instagram }}</a> 
								<br> <a href="#">Youtube: {{ $settings->youtube }}</a> 
								<br> <a href="#">Linkedin: {{ $settings->linkedin }}</a> 
							</p>
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