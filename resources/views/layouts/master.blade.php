<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Travel - Tour Travel</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- FAV ICON -->
    <link rel="shortcut icon" href="{{ asset('uploads/settings/' . $settings['favicon']) }}" type="image/x-icon">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="{{ asset('assets/templates/css/font-awesome.min.css') }}">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="{{ asset('assets/templates/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/css/mob.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/css/animate.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->


</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <div class="pop-bg"></div>

    <!-- MOBILE MENU -->
    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('uploads/settings/' . $settings['logo']) }}"
                                alt="{{ $settings['name'] }}" />
                        </a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <h4>Home pages</h4>

                            <h4>Tour Packages</h4>
                            <ul>
                                <li><a href="{{ route('packages') }}">All Packages</a></li>
                                @foreach($packageTypes as $package)
                                    <li><a
                                            href="{{ route('packages', ['package_id' => $package->id]) }}">{{ $package->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <h4>Sighe Seeings Pages</h4>
                            <ul>
                                @foreach ($latestSightSeeings as $sightseeing)
                                    
                                        <li><a href="{{ route('sightseeing.details', $sightseeing->id) }}">{{ $sightseeing->name }}</a></li>
                                @endforeach
                               
                            </ul>
                            <h4>User Dashboard</h4>
                            <ul>
                                <li><a href="{{ route('user.profile') }}">My Profile</a></li>
                                <li><a href="{{ route('user.booking.tour-package') }}">Tour Packages</a></li>
                                <li><a href="{{ route('user.booking.hotel') }}">Hotel Bookings</a></li>
                                <li><a href="{{ route('user.booking.event') }}">Event bookings</a></li>
                                <li><a href="{{ route('user.booking.car') }}">Car Rental Bookings</a></li> 
                                <li><a href="{{ route('user.booking.flight') }}">Flight Bookings</a></li>
                                <li><a href="{{ route('user.booking.custom') }}">Custom Package Booking</a></li>
                                

                            </ul>
                            <h4>Other pages:1</h4>
                            <ul>
                                <li><a href="{{ route('packages') }}">All package</a></li>
                                <li><a href="{{ route('hotels') }}">All hotels</a></li>
                            </ul>
                            <h4 class="ed-dr-men-mar-top">User login pages</h4>
                            <ul>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                <li><a href="{{ route('login') }}">Login and Sign in</a></li>
                            </ul>
                            <h4>Other pages:2</h4>
                            <ul>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                                <li><a href="{{ route('events') }}">Events</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('tips') }}">Tips Before Travel</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="#">Contact: {{ $settings['location'] ?? 'N/A' }}</a>
                                </li>
                                <li><a href="#">Phone: {{ $settings['phone'] ?? 'N/A' }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul>
                                <li><span class="sear-pop pop-ini" data-pop="pop-search"><i class="fa fa-search"
                                            aria-hidden="true"></i></span></li>
                                <li><a href="{{ route('login') }}" class="top-sign">Sign In</a>
                                </li>
                                <li><a href="{{ route('register') }}" class="top-regi">Sign Up</a>
                                </li>
                                <li><a href="{{ route('dashboard') }}" class="top-prof">Profile</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="{{ $settings['facebook'] ?? '#' }}"><i class="fa fa-facebook"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li><a href="{{ $settings['youtube'] ?? '#' }}"><i class="fa fa-youtube"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li><a href="{{ $settings['x'] ?? '#' }}"><i class="fa fa-twitter"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li><a href="{{ $settings['instagram'] ?? '#' }}"><i class="fa fa-instagram"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li><a href="{{ $settings['linkedin'] ?? '#' }}"><i class="fa fa-linkedin"
                                            aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('uploads/settings/' . $settings['logo']) }}"
                                    alt="{{ $settings['name'] }}" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="about-menu">
                                    <a href="{{ route('packages') }}" class="mm-arr">Packages</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="about-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-s1">
                                                    @php
                                                        $latestTour = \App\Models\Tour::latest()->first();
                                                        $imageUrl = $latestTour && $latestTour->image ? asset('uploads/tours/' . $latestTour->image) : asset('assets/templates/images/sight/5.jpg');
                                                    @endphp
                                                    @if($latestTour)
                                                        <div class="ed-course-in">
                                                            <a class="course-overlay menu-about"
                                                                href="{{ route('package.details', $latestTour->id) }}">
                                                                <img src="{{ $imageUrl }}" alt="{{ $latestTour->title }}">
                                                                <span>{{ $latestTour->title }}</span>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div class="ed-course-in">
                                                            <a class="course-overlay menu-about"
                                                                href="{{ route('packages') }}">
                                                                <img src="{{ asset('assets/templates/images/sight/5.jpg') }}"
                                                                    alt="">
                                                                <span>Popular Package</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="mm1-com mm1-s2">
                                                    @php
                                                        $latestTour = \App\Models\Tour::latest()->first();
                                                    @endphp
                                                    @if($latestTour)
                                                        <p>{{ $latestTour->short_description ?? 'Explore amazing travel packages with great experiences and unforgettable memories.' }}
                                                        </p>
                                                        <a href="{{ route('package.details', $latestTour->id) }}"
                                                            class="mm-r-m-btn">Read more</a>
                                                    @else
                                                        <p>Want to change the world? At Berkeley we're doing just that. When
                                                            you join the Golden Bear community, you're part of an
                                                            institution that shifts the global conversation every single
                                                            day.</p>
                                                        <a href="{{ route('packages') }}" class="mm-r-m-btn">Read more</a>
                                                    @endif
                                                </div>
                                                <div class="mm1-com mm1-s3">
                                                    <ul>
                                                        {{-- <li><a href="booking-all.html">All Booking</a></li> --}}
                                                        <li><a href="{{ route('booking.tour-package') }}">Tour Package
                                                                Booking</a></li>
                                                        <li><a href="{{ route('booking.hotel') }}">Hotel Booking</a>
                                                        </li>
                                                        <li><a href="{{ route('booking.car') }}">Car Rentals Booking</a>
                                                        </li>
                                                        <li><a href="{{ route('booking.flight') }}">Flight Booking</a>
                                                        </li>
                                                        <li><a href="{{ route('booking.custom-package') }}">Custom
                                                                Package Booking</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mm1-com mm1-s4">
                                                    <h5>Package Types</h5>
                                                    <ul>
                                                        <li><a href="{{ route('packages') }}">All Packages</a></li>
                                                        @foreach($packageTypes as $package)
                                                            <li><a
                                                                    href="{{ route('packages', ['package_id' => $package->id]) }}">{{ $package->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="admi-menu">
                                    <a href="{{ route('sightseeing') }}" class="mm-arr">Seight Seeing</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="admi-mm m-menu">
                                            <div class="m-menu-inn">
                                                @foreach($latestSightSeeings as $sightseeing)
                                                    <div class="mm2-com mm1-com mm1-s1">
                                                        <div class="ed-course-in">
                                                            <a class="course-overlay"
                                                                href="{{ route('sightseeing.details', $sightseeing->id) }}">
                                                                <img src="{{ $sightseeing->image ? asset('uploads/sightseeing/' . $sightseeing->image) : asset('assets/templates/images/sight/5.jpg') }}"
                                                                    alt="{{ $sightseeing->name }}">
                                                                <span>{{ $sightseeing->name }}</span>
                                                            </a>
                                                        </div>
                                                        <p>{{ $sightseeing->short_description ?? 'Amazing sightseeing location to explore.' }}
                                                        </p>
                                                        <a href="{{ route('sightseeing.details', $sightseeing->id) }}"
                                                            class="mm-r-m-btn">Read more</a>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="{{ route('hotels') }}">Hotels</a></li>
                                <!--<li><a class='dropdown-button ed-sub-menu' href='#' data-activates='dropdown1'>Courses</a></li>-->
                                <li class="cour-menu">
                                    <a href="#!" class="mm-arr">All Pages</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="cour-mm m-menu">
                                            <div class="m-menu-inn">

                                                
                                                <div class="mm1-com mm1-cour-com mm1-s4">
                                                    <h4>Other pages:2</h4>
                                                    <ul>
                                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                                        <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                                                        <li><a href="{{ route('events') }}  ">Events</a></li>
                                                        <li><a href="{{ route('blog') }}">Blog</a></li>
                                                        <li><a href="{{ route('tips') }}">Tips Before Travel</a></li>
                                                        <li><a href="faq.html">FAQ</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="{{ route('user.dashboard') }}">Profile</a>
                                </li>
                                <li><a href="{{ route('contact') }}">Contact us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="al">
                            <div class="head-pro pop-ini" data-pop="pop-advi">
                                @php
                                    $supportTeam = $settings->supportTeam ?? null;
                                @endphp
                                @if($supportTeam && $supportTeam->image && file_exists(public_path('uploads/teams/' . $supportTeam->image)))
                                    <img src="{{ asset('uploads/teams/' . $supportTeam->image) }}" alt="{{ $supportTeam->name }}" loading="lazy">
                                @else
                                    <img src="{{ asset('assets/templates/images/1.jpg') }}" alt="Advisor" loading="lazy">
                                @endif
                                <div>
                                    <b>Advisor</b>
                                    <h4>{{ $supportTeam ? $supportTeam->name : 'Ashley emyy' }}</h4>
                                </div>
                                <span class="fclick"></span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- HEADER & MENU -->
        <div class="menu-pop menu-pop2 pop pop-advi">
            <span class="menu-pop-clo pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
            <div class="inn">
                <div class="menu-pop-help">
                    <h4>Support Team</h4>
                    @php
                        $supportTeam = $settings->supportTeam ?? null;
                    @endphp
                    @if($supportTeam)
                        <div class="user-pro">
                            @if($supportTeam->image && file_exists(public_path('uploads/teams/' . $supportTeam->image)))
                                <img src="{{ asset('uploads/teams/' . $supportTeam->image) }}" alt="{{ $supportTeam->name }}" loading="lazy">
                            @else
                                <img src="{{ asset('assets/templates/images/1.jpg') }}" alt="{{ $supportTeam->name }}" loading="lazy">
                            @endif
                        </div>
                        <div class="user-bio">
                            <h5>{{ $supportTeam->name }}</h5>
                            <span>Travel Advisor</span>
                            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Ask your doubts</a>
                        </div>
                    @else
                        <div class="user-pro">
                            <img src="{{ asset('assets/templates/images/1.jpg') }}" alt="Support" loading="lazy">
                        </div>
                        <div class="user-bio">
                            <h5>Ashley emyy</h5>
                            <span>Senior trip advisor</span>
                            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Ask your doubts</a>
                        </div>
                    @endif
                </div>
                <div class="menu-pop-soci">
                    <ul>
                        @if($supportTeam && $supportTeam->facebook)
                            <li><a href="{{ $supportTeam->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        @endif
                        @if($supportTeam && $supportTeam->twitter)
                            <li><a href="{{ $supportTeam->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        @endif
                        @if($supportTeam && $supportTeam->whatsapp_number)
                            <li><a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', $supportTeam->whatsapp_number) }}" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                        @endif
                        @if($supportTeam && $supportTeam->linkedin)
                            <li><a href="{{ $supportTeam->linkedin }}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        @endif
                        @if($supportTeam && $supportTeam->youtube)
                            <li><a href="{{ $supportTeam->youtube }}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        @endif
                        @if($supportTeam && $supportTeam->instagram)
                            <li><a href="{{ $supportTeam->instagram }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        @endif
                        @if(!$supportTeam)
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        @endif
                    </ul>
                </div>

                <ul class="menu-pop-info">
                    @if($supportTeam && $supportTeam->whatsapp_number)
                        <li><a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', $supportTeam->whatsapp_number) }}" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i>{{ $supportTeam->whatsapp_number }}</a></li>
                        <li><a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', $supportTeam->whatsapp_number) }}" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i>{{ $supportTeam->whatsapp_number }}</a></li>
                    @else
                        <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i>+92 (8800) 68 - 8960</a></li>
                        <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i>+92 (8800) 68 - 8960</a></li>
                    @endif
                    @if($supportTeam && $supportTeam->email)
                        <li><a href="mailto:{{ $supportTeam->email }}"><i class="fa fa-envelope-o" aria-hidden="true"></i>{{ $supportTeam->email }}</a></li>
                    @else
                        <li><a href="#!"><i class="fa fa-envelope-o" aria-hidden="true"></i>help@company.com</a></li>
                    @endif
                    @if($supportTeam && $supportTeam->location)
                        <li><a href="#!"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $supportTeam->location }}</a></li>
                    @else
                        <li><a href="#!"><i class="fa fa-map-marker" aria-hidden="true"></i>3812 Lena Lane City Jackson Mississippi</a></li>
                    @endif
                </ul>

                @php
                    $latestBlogs = \App\Models\Blog::latest()->take(4)->get();
                @endphp

                <div class="late-news">
                    <h4>Latest news</h4>
                    <ul>
                        @foreach($latestBlogs as $blog)
                        <li>
                            <div class="rel-pro-img">
                                <img src="{{ asset('uploads/blogs/'.$blog->image) }}" 
                                    alt="{{ $blog->title }}" 
                                    loading="lazy">
                            </div>

                            <div class="rel-pro-con">
                                <h5>{{ \Illuminate\Support\Str::limit($blog->title, 50) }}</h5>
                                <span class="ic-date">
                                    {{ $blog->created_at->format('d M Y') }}
                                </span>
                            </div>

                            <!-- ✅ এখানে route ব্যবহার করো -->
                            <a href="{{ route('blog.details', $blog->slug) }}" class="fclick"></a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- HELP BOX -->
                <div class="prof-rhs-help">
                    <div class="inn">
                        <h3>Tell us your Needs</h3>
                        <p>Tell us what kind of service you are looking for.</p>
                        <a href="{{ route('register') }}">Register for free</a>
                    </div>
                </div>
                <!-- END HELP BOX -->
            </div>
        </div>
        <!-- END HEADER & MENU -->
    </section>
    <!--END HEADER SECTION-->
    <!-- TOP SEARCH BOX -->
    <section>
        <div class="search-top pop pop-search">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ban-search form-select">
                            <form method="GET" action="{{ route('packages') }}">
                                <ul>
                                    <!-- Location -->
                                    <li class="sr-look">
                                        <div class="form-group">
                                            <label>Your destination</label>
                                            <select name="location" class="chosen-select">
                                                <option value="">Any location</option>
                                                @foreach($locations as $location)
                                                    <option value="{{ $location }}">
                                                        {{ $location }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>

                                    <!-- Package -->
                                    <li class="sr-gue">
                                        <div class="form-group">
                                            <label>Package</label>
                                            <select name="package_id" class="chosen-select">
                                                <option value="">Any Package</option>
                                                @foreach($packageTypes as $package)
                                                    <option value="{{ $package->id }}">
                                                        {{ $package->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </li>

                                    <!-- Check In -->
                                    <li class="sr-date">
                                        <div class="form-group">
                                            <label>Check In</label>
                                            <input type="date" name="check_in" class="form-control">
                                        </div>
                                    </li>

                                    <!-- Check Out -->
                                    <li class="sr-date">
                                        <div class="form-group">
                                            <label>Check Out</label>
                                            <input type="date" name="check_out" class="form-control">
                                        </div>
                                    </li>

                                    <!-- Submit -->
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
    @yield('content')

    <!--====== FOOTER 1 ==========-->
    <section>
        <div class="rows">
            <div class="footer1 home_title tb-space">
                <div class="pla1 container">
                    <!-- FOOTER OFFER 1 -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="disco">
                            <h3>30%<span>OFF</span></h3>
                            <h4>Eiffel Tower,Rome</h4>
                            <p>valid only for 24th Dec</p> <a href="booking.html">Book Now</a>
                        </div>
                    </div>
                    <!-- FOOTER OFFER 2 -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="disco1 disco">
                            <h3>42%<span>OFF</span></h3>
                            <h4>Colosseum,Burj Al Arab</h4>
                            <p>valid only for 18th Nov</p> <a href="booking.html">Book Now</a>
                        </div>
                    </div>
                    <!-- FOOTER MOST POPULAR VACATIONS -->
                    <div class="col-md-6 col-sm-12 col-xs-12 foot-spec footer_places">
                        <h4><span>Most Popular</span> Vacations</h4>
                        <ul>
                            <li><a href="tour-details.html">Angkor Wat</a> </li>
                            <li><a href="tour-details.html">Buckingham Palace</a> </li>
                            <li><a href="tour-details.html">High Line</a> </li>
                            <li><a href="tour-details.html">Sagrada Família</a> </li>
                            <li><a href="tour-details.html">Statue of Liberty </a> </li>
                            <li><a href="tour-details.html">Notre Dame de Paris</a> </li>
                            <li><a href="tour-details.html">Taj Mahal</a> </li>
                            <li><a href="tour-details.html">The Louvre</a> </li>
                            <li><a href="tour-details.html">Tate Modern, London</a> </li>
                            <li><a href="tour-details.html">Gothic Quarter</a> </li>
                            <li><a href="tour-details.html">Table Mountain</a> </li>
                            <li><a href="tour-details.html">Bayon</a> </li>
                            <li><a href="tour-details.html">Great Wall of China</a> </li>
                            <li><a href="tour-details.html">Hermitage Museum</a> </li>
                            <li><a href="tour-details.html">Yellowstone</a> </li>
                            <li><a href="tour-details.html">Musée d'Orsay</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== FOOTER 2 ==========-->
    <section>
        <div class="rows">
            <div class="footer">
                <div class="container">
                    <div class="foot-sec2">
                        <div>
                            <div class="row">
                                <div class="col-sm-3 foot-spec foot-com">
                                    <h4>{{ $settings['name'] ?? 'Tour & Travel' }}</h4>
                                    <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide.
                                    </p>
                                </div>
                                <div class="col-sm-3 foot-spec foot-com">
                                    <h4><span>Address</span> & Contact Info</h4>
                                    <p>{{ $settings['location'] ?? 'N/A'}}</p>
                                    <p> <span class="strong">Phone: </span> <span
                                            class="highlighted">{{ $settings['phone'] ?? 'N/A' }}</span> </p>
                                </div>
                                <div class="col-sm-3 col-md-3 foot-spec foot-com">
                                    <h4><span>SUPPORT</span> & HELP</h4>
                                    <ul class="two-columns">
                                        <li> <a href="{{ route('about') }}">About Us</a> </li>
                                        <li> <a href="#">FAQ</a> </li>
                                        <li> <a href="#">Feedbacks</a> </li>
                                        <li> <a href="#">Blog </a> </li>
                                        <li> <a href="#">Use Cases</a> </li>
                                        <li> <a href="#">Advertise us</a> </li>
                                        <li> <a href="#">Discount</a> </li>
                                        <li> <a href="#">Vacations</a> </li>
                                        <li> <a href="#">Branding Offers </a> </li>
                                        <li> <a href="{{ route('contact') }}">Contact Us</a> </li>
                                    </ul>
                                </div>
                                <div class="col-sm-3 foot-social foot-spec foot-com">
                                    <h4><span>Follow</span> with us</h4>
                                    <p>Join the thousands of other There are many variations of passages of Lorem Ipsum
                                        available</p>
                                    <ul>
                                        <li><a href="{{ $settings['facebook'] ?? '#'}}"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a> </li>
                                        <li><a href="{{ $settings['google_plus'] ?? '#'}}"><i class="fa fa-google-plus"
                                                    aria-hidden="true"></i></a> </li>
                                        <li><a href="{{ $settings['x'] ?? '#'}}"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a> </li>
                                        <li><a href="{{ $settings['linkedin'] ?? '#'}}"><i class="fa fa-linkedin"
                                                    aria-hidden="true"></i></a> </li>
                                        <li><a href="{{ $settings['youtube'] ?? '#'}}"><i class="fa fa-youtube"
                                                    aria-hidden="true"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== FOOTER - COPYRIGHT ==========-->
    <section>
        <div class="rows copy">
            <div class="container">
                <p>Copyrights © 2023 Company Name. All Rights Reserved</p>
            </div>
        </div>
    </section>
    <section>
        <div class="icon-float">
            <ul>
                <li><a href="#" class="sh">1k <br> Share</a> </li>
                <li><a href="#" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="gp1"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="tw1"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="li1"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="wa1"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="sh1"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>
            </ul>
        </div>
    </section>
    <!--========= Scripts ===========-->
    <script src="{{ asset('assets/templates/js/jquery-latest.min.js') }}"></script>
    <script src="{{ asset('assets/templates/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/templates/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/templates/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/templates/js/select-opt.js') }}"></script>
    <script src="{{ asset('assets/templates/js/slick.js') }}"></script>
    <script src="{{ asset('assets/templates/js/custom.js') }}"></script>
    <script>

        $('.multiple-items').slick({
            dots: true,
            arrows: false,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false,
                }
            }]

        });
        $('.slider-all').slick({
            dots: true,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 3000,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false,
                }
            }]

        });
    </script>
</body>

</html>