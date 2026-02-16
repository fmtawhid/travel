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
		
	<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<div class="spe-title tit-inn-pg">
					<h1>About <span>Us</span> </h1>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide.</p>
					<ul>
						<li><a href="main.html">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#" class="bread-acti">About</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== ABOUT CONTENT ==========-->
	<section class="tourb2-ab-p-2 com-colo-abou">
		<div class="container">
			<div class="row tourb2-ab-p1">
				<div class="col-md-6 col-sm-6">
					<div class="tourb2-ab-p1-left">
						<h3>Hi! Welcome to Holiday Tour & Travels</h3> <span>Duis pretium gravida nisi, ut pulvinar lorem bibendum eget</span>
						<p>Aliquam blandit nisl sem. Mauris quis enim purus. Vivamus nec tortor bibendum risus placerat vulputate at gravida ante. Nam sit amet tellus enim. Phasellus consectetur porttitor lobortis. Integer cursus odio at mattis porttitor. In hac habitasse platea dictumst. Nunc sit amet cursus felis. Etiam venenatis auctor metus, et lacinia elit dignissim non. Aenean auctor semper erat porta dictum.</p>
						<p>Fusce velit sem, vestibulum ac enim ut, tincidunt pretium augue. Vestibulum purus sapien, porttitor a porta faucibus, hendrerit eget enim.</p> <a href="#" class="link-btn">Call to us: 13654 87898</a> </div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="tourb2-ab-p1-right"> <img src="images/iplace-8.jpg" alt="" /> </div>
				</div>
			</div>
		</div>
	</section>
	<section class="tourb2-ab-p-3 com-colo-abou">
		<div class="container">
			<div class="row tourb2-ab-p3">
				<div class="col-md-3 col-sm-6">
					<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>240</span>
						<h4>Packages</h4>
						<p>Vivamus nec tortor bibendum risus placerat vulputate at gravida ante</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>960</span>
						<h4>Places</h4>
						<p>Vivamus nec tortor bibendum risus placerat vulputate at gravida ante</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>400</span>
						<h4>Events</h4>
						<p>Vivamus nec tortor bibendum risus placerat vulputate at gravida ante</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="tourb2-ab-p3-1 tourb2-ab-p3-com"> <span>120</span>
						<h4>Hotels</h4>
						<p>Vivamus nec tortor bibendum risus placerat vulputate at gravida ante</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="tourb2-ab-p-4 com-colo-abou">
		<div class="container">
			<div class="row tourb2-ab-p4">
				<div class="col-md-6 col-sm-6">
					<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-flag-o" aria-hidden="true"></i>
						<div class="tourb2-ab-p4-text">
							<h4><span>Travel</span> Booking</h4>
							<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-map-o" aria-hidden="true"></i>
						<div class="tourb2-ab-p4-text">
							<h4><span>Hotel</span> Booking</h4>
							<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-gamepad" aria-hidden="true"></i>
						<div class="tourb2-ab-p4-text">
							<h4><span>Events</span> Booking</h4>
							<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-umbrella" aria-hidden="true"></i>
						<div class="tourb2-ab-p4-text">
							<h4><span>Sight Seeing</span> Booking</h4>
							<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-binoculars" aria-hidden="true"></i>
						<div class="tourb2-ab-p4-text">
							<h4><span>Tour</span> Discount</h4>
							<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="tourb2-ab-p4-1 tourb2-ab-p4-com"> <i class="fa fa-globe" aria-hidden="true"></i>
						<div class="tourb2-ab-p4-text">
							<h4><span>Top</span> Brandings</h4>
							<p>Curabitur vestibulum porta tortor vitae lacinia. Duis pretium gravida nisi, ut pulvinar lorem bibendum eget. Praesent turpis elit, dignissim nec tempor at, congue non justo.</p>
						</div>
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
    <!--====== TIPS BEFORE TRAVEL ==========-->
@endsection