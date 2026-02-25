@extends('layouts.master')
@section('content')

	<!--====== BANNER ==========-->

    <section>
		<div class="rows inner_banner inner_banner_3">
			<div class="container">
				<div class="spe-title tit-inn-pg">
					<h1>User <span>Testimonials</span> </h1>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide.</p>
					<ul>
						<li><a href="{{ route('home') }}">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#" class="bread-acti">Testimonials</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== ALL TESTIMONIALS ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container tb-space inn-page-con-bg pad-bot-redu" id="inner-page-title">
				<div class="p_testimonial">
					@forelse($reviews as $review)
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> 
								<img style="width: -webkit-fill-available;border-radius: 50%;" src="{{ $review->user && $review->user->image ? asset('uploads/users/' . $review->user->image) : asset('assets/templates/images/testi_img.png') }}" alt="{{ $review->user->name ?? 'User' }}"> 
							</div>
							<div class="col-md-9 col-sm-9">
								<h4>{{ $review->user->name ?? 'Anonymous' }}</h4>
								<div><span class="tour_star">
									@for($i = 0; $i < floor($review->rating); $i++)
										<i class="fa fa-star" aria-hidden="true"></i>
									@endfor
									@if($review->rating % 1 >= 0.5)
										<i class="fa fa-star-half-o" aria-hidden="true"></i>
									@endif
								</span> </div>
								<p>{{ Str::limit($review->message, 150, '...') }}</p>
								<address>{{ $review->user->city ?? 'City' }}</address>
							</div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					@empty
					<div class="col-md-12">
						<p>No testimonials yet</p>
					</div>
					@endforelse
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="{{ asset('assets/templates/images/testi_img.png') }}" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Praesent rutrum convallis nisl vitae aliquam. Suspendisse non quam vehicula, tincidunt nibh at, porta orci. Maecenas egestas</p> <address>Illinois, USA</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
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