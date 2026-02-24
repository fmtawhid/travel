<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lava Material - Web Application and Website Multipurpose Admin Panel Template</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--== FAV ICON ==-->
    <link rel="shortcut icon" href="{{ asset('uploads/settings/' . $settings['favicon']) }}" type="image/x-icon">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Quicksand:300,400,500" rel="stylesheet">

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">

    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/mob.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/materialize.css') }}" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="{{ route('admin.dashboard') }}" class="logo">
                    <img src="{{ $settings && $settings->logo ? asset('uploads/settings/' . $settings->logo) : asset('assets/admin/images/logo1.png') }}" alt="Logo" />
                </a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-md-6 col-sm-6 mob-hide">
                <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </div>
            <!--== NOTIFICATION ==-->
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href='#'><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href='#'><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href='#'><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a>
                </div>
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="{{ asset('assets/admin/images/user/6.png') }}" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="setting.html" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Admin Setting</a>
                    </li>
                    <li><a href="hotel-all.html" class="waves-effect"><i class="fa fa-building-o" aria-hidden="true"></i> Hotels</a>
                    </li>
                    <li><a href="package-all.html" class="waves-effect"><i class="fa fa-umbrella" aria-hidden="true"></i> Tour Packages</a>
                    </li>
                    <li><a href="event-all.html" class="waves-effect"><i class="fa fa-flag-checkered" aria-hidden="true"></i> Events</a>
                    </li>
                    <li><a href="offers.html" class="waves-effect"><i class="fa fa-tags" aria-hidden="true"></i> Offers</a>
                    </li>
                    <li><a href="user-add.html" class="waves-effect"><i class="fa fa-user-plus" aria-hidden="true"></i> Add New User</a>
                    </li>
                    <li><a href="#" class="waves-effect"><i class="fa fa-undo" aria-hidden="true"></i> Backup Data</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" class="ho-dr-con-last waves-effect"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </div>
        <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li>
                            @if(auth()->user()->image)
                                <img src="{{ asset('uploads/users/' . auth()->user()->image) }}" 
                                    alt="User Image"
                                    width="80"
                                    style="border-radius:50%;">
                            @else
                                <img src="{{ asset('assets/admin/images/user/6.png') }}" 
                                    alt="Default Image"
                                    width="80"
                                    style="border-radius:50%;">
                            @endif
                        </li>

                        <li>
                            <h5>
                                {{ auth()->user()->name ?? 'User' }}
                                <span>
                                    {{ auth()->user()->city ?? 'No City' }}
                                    @if(auth()->user()->country)
                                        , {{ auth()->user()->country }}
                                    @endif
                                </span>
                            </h5>
                        </li>

                        <li></li>
                    </ul>

                </div>
                <!--== LEFT MENU ==-->
                <div class="sb2-13">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li><a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'menu-active active' : '' }}"><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</a>
                        </li>
                        <li>
                            @php
                                $isUsersActive = Route::is('admin.users.*');
                            @endphp
                            <a href="javascript:void(0)" class="collapsible-header {{ $isUsersActive ? 'menu-active active' : '' }}"><i class="fa fa-user" aria-hidden="true"></i> Users</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('admin.users.index') }}" class="{{ Route::is('admin.users.index') ? 'menu-active active' : '' }}">All Users</a>
                                    </li>
                                    <li><a href="{{ route('admin.users.create') }}" class="{{ Route::is('admin.users.create') ? 'menu-active active' : '' }}">Add New user</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            @php
                                $isToursActive = Route::is('admin.tours.*', 'admin.packages.*');
                            @endphp
                            <a href="javascript:void(0)" class="collapsible-header {{ $isToursActive ? 'menu-active active' : '' }}"><i class="fa fa-umbrella" aria-hidden="true"></i> Tour Packages</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('admin.tours.index') }}" class="{{ Route::is('admin.tours.index') ? 'menu-active active' : '' }}">All Packages</a>
                                    </li>
                                    <li><a href="{{ route('admin.tours.create') }}" class="{{ Route::is('admin.tours.create') ? 'menu-active active' : '' }}">Add New Package</a>
                                    </li>
                                    <li><a href="{{ route('admin.packages.index') }}" class="{{ Route::is('admin.packages.index') ? 'menu-active active' : '' }}">Packages Type</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                        <li>
                            @php
                                $isHotelsActive = Route::is('admin.hotels.*', 'admin.room-types.*', 'admin.hotel-amenities.*');
                            @endphp
                            <a href="javascript:void(0)" class="collapsible-header {{ $isHotelsActive ? 'menu-active active' : '' }}"><i class="fa fa-h-square" aria-hidden="true"></i> Hotels</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('admin.hotels.index') }}" class="{{ Route::is('admin.hotels.index') ? 'menu-active active' : '' }}">All Hotels</a>
                                    </li>
                                    <li><a href="{{ route('admin.hotels.create') }}" class="{{ Route::is('admin.hotels.create') ? 'menu-active active' : '' }}">Add New Hotel</a>
                                    </li>
                                    <li><a href="{{ route('admin.hotel-amenities.index') }}" class="{{ Route::is('admin.hotel-amenities.index') ? 'menu-active active' : '' }}">Aminity</a>
                                    </li>
                                    {{-- <li><a href="hotel-room-type-add.html">Add Room Type</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>
                        <li>
                            @php
                                $isSightSeeingtActive = Route::is('admin.sightseeings.*');
                            @endphp
                            <a href="javascript:void(0)" class="collapsible-header {{ $isSightSeeingtActive ? 'menu-active active' : '' }}"><i class="fa fa-picture-o" aria-hidden="true"></i> Sight Seeings</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('admin.sightseeings.index') }}" class="{{ Route::is('admin.sightseeings.index') ? 'menu-active active' : '' }}">All Sight Seeings</a>
                                    </li>
                                    <li><a href="{{ route('admin.sightseeings.create') }}" class="{{ Route::is('admin.sightseeings.create') ? 'menu-active active' : '' }}">Add New Sight Seeing</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            @php
                                $isEventsActive = Route::is('admin.events.*');
                            @endphp
                            <a href="javascript:void(0)" class="collapsible-header {{ $isEventsActive ? 'menu-active active' : '' }}"><i class="fa fa-calendar-o" aria-hidden="true"></i> Events</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('admin.events.index') }}" class="{{ Route::is('admin.events.index') ? 'menu-active active' : '' }}">All Events</a>
                                    </li>
                                    <li><a href="{{ route('admin.events.create') }}" class="{{ Route::is('admin.events.create') ? 'menu-active active' : '' }}">Add New Event</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        {{-- <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-braille" aria-hidden="true"></i> Ui-Kits</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="ui-form.html">ui-form</a>
                                    </li>
                                    <li><a href="ui-kit.html">ui-kit</a>
                                    </li>
                                    <li><a href="ui-table.html">ui-table</a>
                                    </li>
                                    <li><a href="ui-pre-load.html">ui-pre-load</a>
                                    </li>
                                    <li><a href="ui-tab.html">ui-tab</a>
                                    </li>
                                    <li><a href="ui-icons.html">ui-icons</a>
                                    </li>
                                    <li><a href="ui-collapsible.html">ui-collapsible</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        {{-- <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-usd" aria-hidden="true"></i> Discounts</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="discount.html">All Discounts</a>
                                    </li>
                                    <li><a href="discount-add.html">Add New Discounts</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-tags" aria-hidden="true"></i> Offers</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="offers.html">All Offers</a>
                                    </li>
                                    <li><a href="offers-add.html">Add New Offers</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        <li>
                            @php
                                $isBookingActive = Route::is('admin.booking-inquiries.*');
                            @endphp
                            <a href="javascript:void(0)" class="collapsible-header {{ $isBookingActive ? 'menu-active active' : '' }}"><i class="fa fa-ticket" aria-hidden="true"></i> Booking & Enquiry</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('admin.booking-inquiries.hotel') }}" class="{{ Route::is('admin.booking-inquiries.hotel') ? 'menu-active active' : '' }}">Hotel</a>
                                    </li>
                                    <li><a href="{{ route('admin.booking-inquiries.tour-package') }}" class="{{ Route::is('admin.booking-inquiries.tour-package') ? 'menu-active active' : '' }}">Package</a>
                                    </li>
                                    <li><a href="{{ route('admin.booking-inquiries.flight') }}" class="{{ Route::is('admin.booking-inquiries.flight') ? 'menu-active active' : '' }}">Flight</a>
                                    </li>
                                    <li><a href="{{ route('admin.booking-inquiries.car') }}" class="{{ Route::is('admin.booking-inquiries.car') ? 'menu-active active' : '' }}">Car</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            @php
                                $isBlogArticlesActive = Route::is('admin.blogs.*');
                            @endphp
                            <a href="javascript:void(0)" class="collapsible-header {{ $isBlogArticlesActive ? 'menu-active active' : '' }}"><i class="fa fa-rss" aria-hidden="true"></i> Blog & Articals</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('admin.blogs.index') }}" class="{{ Route::is('admin.blogs.index') ? 'menu-active active' : '' }}">All Blogs</a>
                                    </li>
                                    <li><a href="{{ route('admin.blogs.create') }}" class="{{ Route::is('admin.blogs.create') ? 'menu-active active' : '' }}">Add Blog</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="social-media.html"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Social Media</a>
                        </li>
                        <li><a href="login.html" target="_blank"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                        </li>
                    </ul>
                </div>
            </div>

    @yield('content')
    
        </div>
    </div>
    <!--== BOTTOM FLOAT ICON ==-->
    <section>
        <div class="fixed-action-btn vertical">
            <a class="btn-floating btn-large red pulse">
                <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
                <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a>
                </li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a>
                </li>
                <li><a class="btn-floating green"><i class="material-icons">publish</i></a>
                </li>
                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a>
                </li>
            </ul>
        </div>
    </section>

    <!--======== SCRIPT FILES =========-->
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/materialize.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
</body>

</html>