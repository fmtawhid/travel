@extends('layouts.master')
@section('content')
	
	<!--====== BANNER ==========-->
	<section>
		<div class="rows inner_banner inner_banner_1">
			<div class="container">
                <div class="spe-title tit-inn-pg">
					<h1>Holiday Tour <span>Blog Posts</span> </h1>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>Book travel packages and enjoy your holidays with distinctive experience</p>
					<ul>
						<li><a href="main.html">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#" class="bread-acti">Blogs</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== ALL POST ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
				<!--===== POSTS ======-->
				<div class="rows">
                    @forelse ($blogs as $blog)
                        <div class="posts">
                            <div class="col-md-6 col-sm-6 col-xs-12"> <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" /> </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h3>{{ $blog->title }}</h3>
                                <h5><span class="post_author">Author: {{ $blog->author }}</span><span class="post_date">Date: {{ $blog->created_at->format('d M, Y') }}</span><span class="post_city">City: {{ $blog->city }}</span></h5>
                                <p>{{ Str::limit($blog->description, 550) }}</p>
                                <a href="{{ route('blog.details', $blog->slug) }}" class="link-btn">Read more</a> </div>
                        </div>
                    @empty
                        <p>No blogs found.</p>
                    @endforelse

				</div>
				<!--===== POST END ======-->
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