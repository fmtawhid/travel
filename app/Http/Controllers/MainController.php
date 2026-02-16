<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Tour;
use App\Models\RoomType;
use App\Models\SightSeeing;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Blog;
class MainController extends Controller
{
    public function index()
    {
        return view('template.main');
    }

    public function packages(Request $request)
    {
        $query = Tour::query();

        // Filter by location/destination
        if ($request->filled('location') && $request->location !== 'Any location') {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by date range
        if ($request->filled('check_in')) {
            $query->where('start_date', '>=', $request->check_in);
        }

        if ($request->filled('check_out')) {
            $query->where('end_date', '<=', $request->check_out);
        }


        // Filter by package
        if ($request->filled('package_id') && $request->package_id !== 'any') {
            $query->where('package_id', $request->package_id);
        }


        // Filter by includes
        if ($request->filled('includes')) {
            $includes = $request->includes;
            if (in_array('sightseeing', $includes)) {
                $query->where('include_sightseeing', true);
            }
            if (in_array('hotel', $includes)) {
                $query->where('include_hotel', true);
            }
            if (in_array('transfer', $includes)) {
                $query->where('include_transfer', true);
            }
            if (in_array('luggage', $includes)) {
                $query->where('include_luggage', true);
            }
        }

        // Paginate results - 10 per page
        $tours = $query->paginate(10);
        
        // Get dynamic suggestions - latest 5 tours
        $suggestedTours = Tour::latest()->take(5)->get();
        
        // Get unique locations for dropdown
        $locations = Tour::select('location')->distinct()->pluck('location');
        
        // Get unique package types
        // Fetch unique packages used in tours
        $packageTypes = Package::all();
        
        return view('template.packages', compact('tours', 'suggestedTours', 'locations', 'packageTypes'));
    }

    public function packageDetails($id)
    {
        $tour = Tour::findOrFail($id);
        $itineraries = $tour->itineraries()->orderBy('day_number')->get();
        $galleries = $tour->galleries()->get();
        $reviews = $tour->reviews()->get();
        
        return view('template.package-details', compact('tour', 'itineraries', 'galleries', 'reviews'));
    }



    public function sightseeings()
    {
        $sightseeings = SightSeeing::latest()->paginate(10);
        return view('template.sightseeings', compact('sightseeings'));
    }
    public function sightseeingDetails($id)
    {
        $sightseeing = SightSeeing::findOrFail($id);
        return view('template.sightseeing-details', compact('sightseeing'));
    }



    public function hotels()
    {
        $hotels = Hotel::latest()->paginate(10);
        return view('template.hotels', compact('hotels'));
    }
    public function hotelDetails($id)
    {
        $hotel = Hotel::findOrFail($id);
        $roomTypes = RoomType::where('hotel_id', $hotel->id)->get();
        return view('template.hotel-detail', compact('hotel', 'roomTypes'));
    }

    public function contact()
    {
        return view('template.contact');
    }

    public function about()
    {
        return view('template.about');
    }

    public function testimonials()
    {
        return view('template.testimonials');
    }

    public function blog()
    {
        $blogs = Blog::latest()->paginate(10);
        $recentBlogs = Blog::latest()->take(5)->get();

        return view('template.blog', compact('blogs', 'recentBlogs'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recentBlogs = Blog::latest()->take(5)->get();

        return view('template.blog-details', compact('blog', 'recentBlogs'));
    }

    public function faq()
    {
        
        return view('template.faq');
    }

    public function tips()
    {
        return view('template.tips');
    }
}
