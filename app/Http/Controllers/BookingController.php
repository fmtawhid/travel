<?php

namespace App\Http\Controllers;


class BookingController extends Controller
{
    public function tour_package()
    {
        return view('template.booking.tour-package');
    }

    public function flight()
    {
        return view('template.booking.flight');
    }

    public function car()
    {
        return view('template.booking.car-rentals');
    }
    
    public function hotel()
    {
        return view('template.booking.hotel');
    }


}
