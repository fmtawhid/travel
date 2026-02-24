@extends('layouts.master')
@section('content')

    <!--HEADER SECTION-->
    <section>
        <div class="tourz-search">
            <div class="container">
                <div class="row">
                    <div class="tourz-search-1">
                        <h1>Plan Your Travel Now!</h1>
                        <p>650+ Travel Agents serving 65+ Destinations worldwide</p>

                        <div class="ban-search form-select pop pop-search">

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
        </div>
    </section>
    <!--END HEADER SECTION-->


    <section>
        <div class="rows tb-space pad-bot-redu tb-space">
            <div class="container">
                <div class="tourz-hom-ser">
                    <ul class="slider-all">
                        <li>
                            <div class="hom-quick-acc hom-quick-acc-1">
                                <h2>Book your<span>Travel package</span></h2>
                                <a href="{{ route('booking.tour-package') }}" class="cta-1">Book now</a>
                                <img src="{{ asset('assets/templates/images/home-1.png') }}" loading="lazy" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="hom-quick-acc hom-quick-acc-2">
                                <h2>Book your<span>Car Rentals</span></h2>
                                <a href="{{ route('booking.car') }}" class="cta-1">Book now</a>
                                <img src="{{ asset('assets/templates/images/home-2.png') }}" loading="lazy" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="hom-quick-acc hom-quick-acc-3">
                                <h2>Explore<span>Destinations </span></h2>
                                <a href="{{ route('sightseeing') }}" class="cta-1">Explore</a>
                                <img src="{{ asset('assets/templates/images/home-3.png') }}" loading="lazy" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="hom-quick-acc hom-quick-acc-4">
                                <h2>Over 30,000+<span>Hotels</span></h2>
                                <a href="{{ route('hotels') }}" class="cta-1">Book now</a>
                                <img src="{{ asset('assets/templates/images/home-4.png') }}" loading="lazy" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="hom-quick-acc hom-quick-acc-5">
                                <h2>Travel Events <span>Events</span></h2>
                                <a href="events.html" class="cta-1">Explore</a>
                                <img src="{{ asset('assets/templates/images/home-5.png') }}" loading="lazy" alt="">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- <!--====== Location HOTELS ==========-->
    <section>
        <div class="rows pad-bot-redu">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Top <span>Destinations</span> </h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide.</p>
                </div>
                <!-- CITY -->
                <div class="col-md-6">
                    <a href="tour-details.html">
                        <div class="tour-mig-like-com">
                            <div class="tour-mig-lc-img"> <img src="{{ asset('assets/templates/images/listing/home.jpg') }}" alt=""> </div>
                            <div class="tour-mig-lc-con">
                                <h5>Europe</h5>
                                <p><span>12 Packages</span> Starting from $2400</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="tour-details.html">
                        <div class="tour-mig-like-com">
                            <div class="tour-mig-lc-img"> <img src="{{ asset('assets/templates/images/listing/home3.jpg') }}" alt=""> </div>
                            <div class="tour-mig-lc-con tour-mig-lc-con2">
                                <h5>Dubai</h5>
                                <p>Starting from $2400</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="tour-details.html">
                        <div class="tour-mig-like-com">
                            <div class="tour-mig-lc-img"> <img src="{{ asset('assets/templates/images/listing/home2.jpg') }}" alt=""> </div>
                            <div class="tour-mig-lc-con tour-mig-lc-con2">
                                <h5>India</h5>
                                <p>Starting from $2400</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="tour-details.html">
                        <div class="tour-mig-like-com">
                            <div class="tour-mig-lc-img"> <img src="{{ asset('assets/templates/images/listing/home1.jpg') }}" alt=""> </div>
                            <div class="tour-mig-lc-con tour-mig-lc-con2">
                                <h5>Usa</h5>
                                <p>Starting from $2400</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="tour-details.html">
                        <div class="tour-mig-like-com">
                            <div class="tour-mig-lc-img"> <img src="{{ asset('assets/templates/images/listing/home4.jpg') }}" alt=""> </div>
                            <div class="tour-mig-lc-con tour-mig-lc-con2">
                                <h5>London</h5>
                                <p>Starting from $2400</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section> --}}

    <!--====== Location HOTELS ==========-->
    <section>
        <div class="rows pad-bot-redu">
            <div class="container">

                <!-- TITLE -->
                <div class="spe-title">
                    <h2>Top <span>Destinations</span></h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>World's leading Hotel Booking website, Over 30,000 Hotel rooms worldwide.</p>
                </div>

                @foreach($topLocations as $index => $location)

                    {{-- First Item Big (col-6) --}}
                    @if($index == 0)
                        <div class="col-md-6">
                            <a href="{{ route('packages', ['location' => $location->location]) }}">
                                <div class="tour-mig-like-com">
                                    <div class="tour-mig-lc-img">
                                        <img src="{{ asset('assets/templates/images/listing/home.jpg') }}" alt="">
                                    </div>
                                    <div class="tour-mig-lc-con">
                                        <h5>{{ $location->location }}</h5>
                                        <p>
                                            <span>{{ $location->total_packages }} Packages</span>
                                            Starting from ${{ $location->min_price }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    {{-- Others Small (col-3) --}}
                    @else
                        <div class="col-md-3">
                            <a href="{{ route('packages', ['location' => $location->location]) }}">
                                <div class="tour-mig-like-com">
                                    <div class="tour-mig-lc-img">
                                        <img src="{{ asset('assets/templates/images/listing/home3.jpg') }}" alt="">
                                    </div>
                                    <div class="tour-mig-lc-con tour-mig-lc-con2">
                                        <h5>{{ $location->location }}</h5>
                                        <p>
                                            {{-- <span>{{ $location->total_packages }} Packages</span><br> --}}
                                            Starting from ${{ $location->min_price }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                @endforeach

            </div>
        </div>
    </section>






    <section>
        <div class="rows pad-bot-redu">
            <div class="container">

                <!-- TITLE -->
                <div class="spe-title">
                    <h2>Tour <span>Packages</span></h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide.</p>
                </div>

                <!-- HOTEL GRID -->
                <div class="to-ho-hotel">
                    <ul class="multiple-items">

                        @foreach($packages as $package)

                            <li class="col-md-4">
                                <div class="to-ho-hotel-con pack-new-box">
                                    <div class="to-ho-hotel-con-1">

                                        @if($package->image)
                                            <img src="{{ asset('uploads/packages/'.$package->image) }}" alt="{{ $package->name }}">
                                        @else
                                            <img src="{{ asset('assets/templates/images/places/1.jpg') }}" alt="No Image">
                                        @endif

                                        <div class="hom-pack-deta">
                                            <h2>{{ $package->name }}</h2>
                                            <h4>
                                                <span>{{ $package->tours_count ?? 0 }}+</span> destinations
                                            </h4>
                                            <span class="cta-2">Book now</span>
                                        </div>

                                    </div>

                                    <a href="{{ route('packages', ['package_id' => $package->id]) }}" class="fclick"></a>

                                </div>
                            </li>

                        @endforeach

                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!--====== Populer Destination ==========-->
    <section>
        <div class="rows hom-hotels tb-space pad-top-o">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Popular <span>Destinations</span> </h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide.</p>
                </div>
                <!-- HOTEL GRID -->
                <div class="to-ho-hotel">
                    <ul class="multiple-items7">
                        @foreach($sightSeeings as $sightSeeing)
                            <li class="col-md-4">
                                <div class="plac-hom-box">
                                    <div class="plac-hom-box-im">
                                        <img src="{{ asset('uploads/sightseeing/'.$sightSeeing->image) }}" alt="{{ $sightSeeing->name }}" loading="lazy">
                                        <h4>{{ $sightSeeing->name }}</h4>
                                    </div>
                                    <div class="plac-hom-box-txt">
                                        <span>{{ $sightSeeing->description }}</span>
                                        <span>More details</span>
                                    </div>
                                    <a href="{{ route('sightseeing.details', $sightSeeing->id) }}" class="fclick"></a>
                                </div>
                            </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== SECTION: FREE CONSULTANT ==========-->
    <section>
        <div class="offer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4">Do you Need Custom Package?</span>                            <span class="ol-3"></span> <span class="ol-5">$99/-</span>
                            <ul>
                                <li class="wow fadeInUp" data-wow-duration="0.5s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset('assets/templates/images/icon/dis1.png') }}" alt="">
									</a><span>Free WiFi</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="0.7s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset('assets/templates/images/icon/dis2.png') }}" alt=""> </a><span>Breakfast</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="0.9s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset('assets/templates/images/icon/dis3.png') }}" alt=""> </a><span>Pool</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="1.1s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset('assets/templates/images/icon/dis4.png') }}" alt=""> </a><span>Television</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="1.3s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset('assets/templates/images/icon/dis5.png') }}" alt=""> </a><span>GYM</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="offer-r">
                            <div class="or-1"> <span class="or-11">go</span> <span class="or-12">Stays</span> </div>
                            <div class="or-2"> <span class="or-21">Get</span> <span class="or-22">70%</span> <span class="or-23">Off</span> <span class="or-24">use code: RG5481WERQ</span> <span class="or-25"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== EVENTS ==========-->
    <!--<section>
        <div class="rows tb-space">
            <div class="container events events-1" id="inner-page-title">
               
                <div class="spe-title">
                    <h2>Top <span>Events</span> in this month</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
                </div>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Event Name.." title="Type in a name">
                <table id="myTable">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Event Name</th>
                            <th class="e_h1">Date</th>
                            <th class="e_h1">Time</th>
                            <th class="e_h1">Location</th>
                            <th>Book</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="images/iplace-1.jpg" alt="" /><a href="hotels-list.html" class="events-title">Taj Mahal,Agra, India</a> </td>
                            <td class="e_h1">16.12.2016</td>
                            <td class="e_h1">10.00 PM</td>
                            <td class="e_h1">Australia</td>
                            <td><a href="booking.html" class="link-btn">Book Now</a> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="images/iplace-2.jpg" alt="" /><a href="hotels-list.html" class="events-title">Salesforce Summer, Dubai</a> </td>
                            <td class="e_h1">16.12.2016</td>
                            <td class="e_h1">10.00 PM</td>
                            <td class="e_h1">Dubai</td>
                            <td><a href="booking.html" class="link-btn">Book Now</a> </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><img src="images/iplace-3.jpg" alt="" /><a href="hotels-list.html" class="events-title">God Towers, TOKYO, JAPAN</a> </td>
                            <td class="e_h1">16.12.2016</td>
                            <td class="e_h1">10.00 PM</td>
                            <td class="e_h1">JAPAN</td>
                            <td><a href="booking.html" class="link-btn">Book Now</a> </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><img src="images/iplace-4.jpg" alt="" /><a href="hotels-list.html" class="events-title">TOUR DE ROMANDIE, Switzerland</a> </td>
                            <td class="e_h1">16.12.2016</td>
                            <td class="e_h1">10.00 PM</td>
                            <td class="e_h1">Switzerland</td>
                            <td><a href="booking.html" class="link-btn">Book Now</a> </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><img src="images/iplace-5.jpg" alt="" /><a href="hotels-list.html" class="events-title">TOUR DE POLOGNE, Poland</a> </td>
                            <td class="e_h1">16.12.2016</td>
                            <td class="e_h1">10.00 PM</td>
                            <td class="e_h1">Poland</td>
                            <td><a href="booking.html" class="link-btn">Book Now</a> </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><img src="images/iplace-6.jpg" alt="" /><a href="hotels-list.html" class="events-title">Future of Marketing,Sydney, Australia</a> </td>
                            <td class="e_h1">16.12.2016</td>
                            <td class="e_h1">10.00 PM</td>
                            <td class="e_h1">Australia</td>
                            <td><a href="booking.html" class="link-btn">Book Now</a> </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><img src="images/iplace-7.jpg" alt="" /><a href="hotels-list.html" class="events-title">Eiffel Tower, Paris</a> </td>
                            <td class="e_h1">16.12.2016</td>
                            <td class="e_h1">10.00 PM</td>
                            <td class="e_h1">France</td>
                            <td><a href="booking.html" class="link-btn">Book Now</a> </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><img src="images/iplace-8.jpg" alt="" /><a href="hotels-list.html" class="events-title">PARIS - ROUBAIX, England</a> </td>
                            <td class="e_h1">16.12.2016</td>
                            <td class="e_h1">10.00 PM</td>
                            <td class="e_h1">England</td>
                            <td><a href="booking.html" class="link-btn">Book Now</a> </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><img src="images/iplace-9.jpg" alt="" /><a href="hotels-list.html" class="events-title">Dubai Beach Resort, Dubai</a> </td>
                            <td class="e_h1">16.12.2016</td>
                            <td class="e_h1">10.00 PM</td>
                            <td class="e_h1">Dubai</td>
                            <td><a href="booking.html" class="link-btn">Book Now</a> </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td><img src="images/iplace-4.jpg" alt="" /><a href="hotels-list.html" class="events-title">TOUR DE POLOGNE, Poland</a> </td>
                            <td class="e_h1">16.12.2016</td>
                            <td class="e_h1">10.00 PM</td>
                            <td class="e_h1">Poland</td>
                            <td><a href="booking.html" class="link-btn">Book Now</a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>-->
    <!--====== POPULAR TOUR PLACES ==========-->
    <section>
        <div class="rows pla pad-bot-redu tb-space">
            <div class="pla1 p-home container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title spe-title-1">
                    <h2>Top <span>Sight Seeing</span> in this month</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>
                        World's leading tour and travels Booking website,
                        Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience
                    </p>
                </div>

                @foreach($featuredPackages->chunk(2) as $chunk)
                    <div class="popu-places-home">
                        @foreach($chunk as $package)
                            @php
                                $tour = $package->tours->first(); // latest tour
                            @endphp

                            @if($tour)
                                <div class="col-md-6 col-sm-6 col-xs-12 place">
                                    <!-- Image -->
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <img src="{{ asset('uploads/packages/'.$package->image) }}" 
                                            alt="{{ $tour->title }}" 
                                            loading="lazy">
                                    </div>

                                    <!-- Content -->
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <h3>
                                            <span>{{ $package->name }}</span> 
                                            {{ $tour->duration }}
                                        </h3>

                                        <p>{{ \Illuminate\Support\Str::limit($tour->short_description, 120) }}</p>

                                        <a href="{{ route('packages', ['package_id' => $package->id]) }}" 
                                        class="link-btn">
                                            more info
                                        </a>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!--====== REQUEST A QUOTE ==========-->
    <section>
        <div class="ho-popu tb-space pad-bot-redu">
            <div class="rows container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Top <span>Branding</span> for this month</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>Book travel packages and enjoy your holidays with distinctive experience</p>
                </div>
                <div class="ho-popu-bod">
                    <div class="col-md-4">
                        <div class="hot-page2-hom-pre-head">
                            <h4>Top Branding <span>Hotels</span></h4>
                        </div>
                        <div class="hot-page2-hom-pre">
                            <ul>
                                @forelse($topHotels as $hotel)
                                    <li>
                                        <a href="{{ route('hotel.details', $hotel->id) }}">
                                            <div class="hot-page2-hom-pre-1"> 
                                                <img src="{{ asset('uploads/hotels/'.$hotel->image) }}" alt="{{ $hotel->name }}"> 
                                            </div>
                                            <div class="hot-page2-hom-pre-2">
                                                <h5>{{ $hotel->name }}</h5> 
                                                <span>City: {{ $hotel->city ?? 'N/A' }}</span> 
                                            </div>
                                            <div class="hot-page2-hom-pre-3"> 
                                                <span>{{ $hotel->reviews_count ?? 0 }} Reviews</span> 
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                    <li style="text-align: center; padding: 20px; color: #999;">No hotels available</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hot-page2-hom-pre-head">
                            <h4>Top Branding <span>Packages</span></h4>
                        </div>
                        <div class="hot-page2-hom-pre">
                            <ul>
                                @forelse($topPackages as $package)
                                    <li>
                                        <a href="{{ route('packages', ['package_id' => $package->id]) }}">
                                            <div class="hot-page2-hom-pre-1"> 
                                                <img src="{{ asset('uploads/packages/'.$package->image) }}" alt="{{ $package->name }}"> 
                                            </div>
                                            <div class="hot-page2-hom-pre-2">
                                                <h5>{{ $package->name }}</h5> 
                                                <span>Duration: {{ $package->tours->first()?->duration ?? 'N/A' }}</span> 
                                            </div>
                                            <div class="hot-page2-hom-pre-3"> 
                                                <span>{{ $package->reviews_count ?? 0 }} Reviews</span> 
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                    <li style="text-align: center; padding: 20px; color: #999;">No packages available</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hot-page2-hom-pre-head">
                            <h4>Top Branding <span>Reviewers</span></h4>
                        </div>
                        <div class="hot-page2-hom-pre">
                            <ul>
                                @forelse($topReviewers as $reviewer)
                                    <li>
                                        <a href="#">
                                            <div class="hot-page2-hom-pre-1"> 
                                                <img src="{{ $reviewer->image ? asset('uploads/users/'.$reviewer->image) : asset('assets/templates/images/reviewer/1.jpg') }}" alt="{{ $reviewer->name }}"> 
                                            </div>
                                            <div class="hot-page2-hom-pre-2">
                                                <h5>{{ $reviewer->name }}</h5> 
                                                <span>City: {{ $reviewer->city ?? 'N/A' }}</span> 
                                            </div>
                                            <div class="hot-page2-hom-pre-3"> 
                                                <i class="fa fa-hand-o-right" aria-hidden="true"></i> 
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                    <li style="text-align: center; padding: 20px; color: #999;">No reviewers available</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== REQUEST A QUOTE ==========-->
    {{-- <section>
        <div class="foot-mob-sec tb-space">
            <div class="rows container">
                <!-- FAMILY IMAGE(YOU CAN USE ANY PNG IMAGE) -->
                <div class="col-md-6 col-sm-6 col-xs-12 family"> <img src="{{ asset('assets/templates/images/mobile.png') }}" alt="" /> </div>
                <!-- REQUEST A QUOTE -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- THANK YOU MESSAGE -->
                    <div class="foot-mob-app">
                        <h2>Have you tried our mobile app?</h2>
                        <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Easy Hotel Booking</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Tour and Travel Packages</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Package Reviews and Ratings</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Manage your Bookings, Enquiry and Reviews</li>
                        </ul>
                        <a href="#"><img src="{{ asset('assets/templates/images/android.png') }}" alt=""> </a>
                        <a href="#"><img src="{{ asset('assets/templates/images/apple.png') }}" alt=""> </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--====== REQUEST A QUOTE ==========-->
    
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
                                <a href="#"><img src="{{ asset('assets/templates/images/Location-Manager.png') }}" alt=""> </a>
                            </li>
                            <!-- PRIVATE GUIDE -->
                            <li>
                                <a href="#"><img src="{{ asset('assets/templates/images/Private-Guide.png') }}" alt=""> </a>
                            </li>
                            <!-- ARRANGEMENTS -->
                            <li>
                                <a href="#"><img src="{{ asset('assets/templates/images/Arrangements.png') }}" alt=""> </a>
                            </li>
                            <!-- EVENT ACTIVITIES -->
                            <li>
                                <a href="#"><img src="{{ asset('assets/templates/images/Events-Activities.png') }}" alt=""> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection