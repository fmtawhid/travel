@extends('layouts.master')
@section('content')
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
						<li><a href="main.html">Home</a></li>
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
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Praesent rutrum convallis nisl vitae aliquam. Suspendisse non quam vehicula, tincidunt nibh at, porta orci. Maecenas egestas</p> <address>Illinois, USA</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Suspendisse tortor lacus, sodales nec elementum id, lobortis in arcu. Praesent sit amet purus mi. Praesent rutrum convallis.</p> <address>Perth, Australia</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Praesent rutrum convallis nisl vitae aliquam. Suspendisse non quam vehicula, tincidunt nibh at, porta orci. Maecenas egestas</p> <address>Illinois, USA</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Suspendisse tortor lacus, sodales nec elementum id, lobortis in arcu. Praesent sit amet purus mi. Praesent rutrum convallis.</p> <address>Perth, Australia</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Praesent rutrum convallis nisl vitae aliquam. Suspendisse non quam vehicula, tincidunt nibh at, porta orci. Maecenas egestas</p> <address>Illinois, USA</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Suspendisse tortor lacus, sodales nec elementum id, lobortis in arcu. Praesent sit amet purus mi. Praesent rutrum convallis.</p> <address>Perth, Australia</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Praesent rutrum convallis nisl vitae aliquam. Suspendisse non quam vehicula, tincidunt nibh at, porta orci. Maecenas egestas</p> <address>Illinois, USA</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Suspendisse tortor lacus, sodales nec elementum id, lobortis in arcu. Praesent sit amet purus mi. Praesent rutrum convallis.</p> <address>Perth, Australia</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Praesent rutrum convallis nisl vitae aliquam. Suspendisse non quam vehicula, tincidunt nibh at, porta orci. Maecenas egestas</p> <address>Illinois, USA</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Suspendisse tortor lacus, sodales nec elementum id, lobortis in arcu. Praesent sit amet purus mi. Praesent rutrum convallis.</p> <address>Perth, Australia</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Praesent rutrum convallis nisl vitae aliquam. Suspendisse non quam vehicula, tincidunt nibh at, porta orci. Maecenas egestas</p> <address>Illinois, USA</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Suspendisse tortor lacus, sodales nec elementum id, lobortis in arcu. Praesent sit amet purus mi. Praesent rutrum convallis.</p> <address>Perth, Australia</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Praesent rutrum convallis nisl vitae aliquam. Suspendisse non quam vehicula, tincidunt nibh at, porta orci. Maecenas egestas</p> <address>Illinois, USA</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Suspendisse tortor lacus, sodales nec elementum id, lobortis in arcu. Praesent sit amet purus mi. Praesent rutrum convallis.</p> <address>Perth, Australia</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Praesent rutrum convallis nisl vitae aliquam. Suspendisse non quam vehicula, tincidunt nibh at, porta orci. Maecenas egestas</p> <address>Illinois, USA</address> </div>
						</div>
					</div>
					<!--====== TESTIMONIALS ======-->
					<!--====== TESTIMONIALS ======-->
					<div class="col-md-6">
						<div class="p-tesi">
							<div class="col-md-3 col-sm-3"> <img src="images/testi_img.png" alt=""> </div>
							<div class="col-md-9 col-sm-9">
								<h4>Best tour package forever</h4>
								<div><span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </div>
								<p>Suspendisse tortor lacus, sodales nec elementum id, lobortis in arcu. Praesent sit amet purus mi. Praesent rutrum convallis.</p> <address>Perth, Australia</address> </div>
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