@extends('layouts.master')
@section('content')
	
	<!--====== BANNER ==========-->
    <section>
		<div class="rows inner_banner inner_banner_3">
			<div class="container">
				<div class="spe-title tit-inn-pg">
					<h1>{{ $tipPage->title ?? 'Tips' }} <span>{{ $tipPage->subtitle ?? 'For your Travel' }}</span> </h1>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>{{ $tipPage->description ? Str::limit($tipPage->description, 100) : "World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide." }}</p>
					<ul>
						<li><a href="{{ route('home') }}">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#" class="bread-acti">Tips</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== TIPS BEFORE TRAVEL ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu" id="inner-page-title">
				<div class="tourb2-ab-p1 com-colo-abou">
					<div class="col-md-6 col-sm-6">
						<div class="tourb2-ab-p1-left">
							<h3>{{ $tipPage->title ?? 'Welcome to Holiday Tour & Travels' }}</h3>
							<span>{{ $tipPage->subtitle ?? 'Your trusted travel partner' }}</span>
							<p>{{ $tipPage->description ?? 'Travel with confidence and comfort.' }}</p>
							@if($tipPage->phone)
								<a href="tel:{{ $tipPage->phone }}" class="link-btn">Call to us: {{ $tipPage->phone }}</a>
							@endif
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="tourb2-ab-p1-right">
							@if($tipPage->image && file_exists(public_path($tipPage->image)))
								<img src="{{ asset($tipPage->image) }}" alt="{{ $tipPage->title ?? 'Tips' }}" />
							@else
								<img src="{{ asset('assets/templates/images/iplace-8.jpg') }}" alt="Tips Image" />
							@endif
						</div>
					</div>
				</div>
				<div class="tips_travel_1">
					<ul>
						@if($tipPage->tips && count($tipPage->tips) > 0)
							@foreach($tipPage->tips as $tip)
							<!--TIPS LIST-->
							<li class="col-md-4 col-sm-4">
								<div class="tips_travel_2">
									<i class="{{ $tip['icon'] ?? 'fa fa-lightbulb-o' }}" aria-hidden="true"></i>
									<h4>{{ $tip['title'] ?? 'Travel Tip' }}</h4>
									<p>{{ $tip['description'] ?? 'Important travel tip for a better journey.' }}</p>
								</div>
							</li>
							@endforeach
						@else
							<!--DEFAULT TIPS (when no tips are set)-->
							<li class="col-md-4 col-sm-4">
								<div class="tips_travel_2"> <i class="fa fa-address-card-o" aria-hidden="true"></i>
									<h4>Bring copies of your passport</h4>
									<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years </p>
								</div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="tips_travel_2"> <i class="fa fa-flag-o" aria-hidden="true"></i>
									<h4>Register with your embassy</h4>
									<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years </p>
								</div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="tips_travel_2"> <i class="fa fa-money" aria-hidden="true"></i>
									<h4>Always have local cash</h4>
									<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years </p>
								</div>
							</li>
						@endif
					</ul>
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
    <!--====== TIPS BEFORE TRAVEL ==========-->
@endsection