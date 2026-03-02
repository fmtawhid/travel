<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Tour;
use App\Models\RoomType;
use App\Models\SightSeeing;
use App\Models\Event;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Blog;
use App\Models\Review;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
class MainController extends Controller
{
    public function index()
    {
        $locations = Tour::select('location')->distinct()->pluck('location');
        $packageTypes = Package::all();
        $sightSeeings = SightSeeing::latest()->take(6)->get();
        $packages = Package::withCount('tours')->latest()->get();
        $topLocations = Tour::select('location')
        ->selectRaw('COUNT(*) as total_packages')
        ->selectRaw('MIN(price) as min_price')
        ->groupBy('location')
        ->orderByDesc('total_packages') // বেশি package যেটায় সেটা আগে
        ->take(5) // শুধু ৫টা দেখাবো (template অনুযায়ী)
        ->get();
        $featuredPackages = Package::with(['tours' => function ($query) {
            $query->latest()->take(1); // প্রতিটা package এর latest 1 tour
        }])
        ->take(4) // শুধু ৪টা package homepage এ
        ->get();

        // Top Branding Hotels
        $topHotels = Hotel::withCount('reviews')
            ->orderByDesc('reviews_count')
            ->take(5)
            ->get();

        // Top Branding Packages
        $topPackages = Package::withCount([
            'tours' => function ($query) {
                $query->with('reviews');
            }
        ])
            ->get()
            ->map(function ($package) {
                $package->reviews_count = $package->tours->flatMap->reviews->count();
                return $package;
            })
            ->sortByDesc('reviews_count')
            ->take(5);

        // Top Branding Reviewers (Users with most reviews)
        $topReviewers = Review::selectRaw('user_id, COUNT(*) as review_count')
            ->groupBy('user_id')
            ->with('user:id,name,city,image')
            ->orderByDesc('review_count')
            ->take(5)
            ->get()
            ->pluck('user')
            ->filter();

        // Get events for homepage
        $events = Event::latest()->get();

        return view('template.main', compact('locations', 'packageTypes', 'sightSeeings', 'packages', 'topLocations', 'featuredPackages', 'topHotels', 'topPackages', 'topReviewers', 'events'));
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
        // Popular packages (latest 3 tours excluding current tour)
        $popularPackages = Tour::where('id', '!=', $tour->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view('template.package-details', compact('tour', 'itineraries', 'galleries', 'reviews', 'popularPackages'));
    }



    public function sightseeings()
    {
        $sightseeings = SightSeeing::latest()->paginate(10);
        return view('template.sightseeings', compact('sightseeings'));
    }
    public function sightseeingDetails($id)
    {
        $sightseeing = SightSeeing::findOrFail($id);
        // Get other sightseeings excluding current one
        $relatedSightSeeings = SightSeeing::where('id', '!=', $sightseeing->id)
            ->latest()
            ->take(3)
            ->get();
        return view('template.sightseeing-details', compact('sightseeing', 'relatedSightSeeings'));
    }



    public function hotels(Request $request)
    {
        $query = Hotel::query();

        // Filter by location
        if ($request->filled('location') && $request->location !== 'Any location') {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // Filter by min price
        if ($request->filled('min_price')) {
            $query->whereHas('roomTypes', function($q) use ($request) {
                $q->where('price', '>=', $request->min_price);
            });
        }

        // Filter by max price
        if ($request->filled('max_price')) {
            $query->whereHas('roomTypes', function($q) use ($request) {
                $q->where('price', '<=', $request->max_price);
            });
        }

        // Filter by minimum rating
        if ($request->filled('min_rating')) {
            $query->withAvg('reviews', 'rating')
                ->having('reviews_avg_rating', '>=', $request->min_rating);
        }

        // Paginate results - 10 per page
        $hotels = $query->latest()->paginate(10);
        
        // Get top 5 hotels by average rating for sidebar
        $topHotels = Hotel::withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->take(5)
            ->get();
        
        // Get unique locations for dropdown
        $locations = Hotel::select('location')->distinct()->pluck('location');
        
        return view('template.hotels', compact('hotels', 'topHotels', 'locations'));
    }
    public function hotelDetails($id)
    {
        $hotel = Hotel::findOrFail($id);
        $roomTypes = RoomType::where('hotel_id', $hotel->id)->get();
        $reviews = $hotel->reviews()->latest()->get();
        // Calculate average rating
        $averageRating = $hotel->reviews()->avg('rating') ?? 0;
        return view('template.hotel-detail', compact('hotel', 'roomTypes', 'reviews', 'averageRating'));
    }

    public function contact()
    {
        $settings = \App\Models\Setting::first();
        return view('template.contact', compact('settings'));
    }

    public function about()
    {
        $aboutPage = \App\Models\AboutPage::first();
        $totalPackages = Package::count();
        $totalPlaces = SightSeeing::count();
        $totalEvents = Event::count();
        $totalHotels = Hotel::count();
        
        return view('template.about', compact('aboutPage', 'totalPackages', 'totalPlaces', 'totalEvents', 'totalHotels'));
    }

    public function testimonials()
    {
        $reviews = Review::whereNotNull('user_id')
            ->with('user:id,name,image,city')
            ->orderByDesc('created_at')
            ->get()
            ->unique('user_id')
            ->values();
        
        return view('template.testimonials', compact('reviews'));
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
        $tipPage = \App\Models\Tip::first();
        
        return view('template.tips', compact('tipPage'));
    }

    public function events()
    {
        $events = Event::latest()->paginate(10);
        return view('template.events', compact('events'));
    }
    




    public function storeTourReview(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'rating'  => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:1000',
        ]);

        // Prevent duplicate review
        $alreadyReviewed = Review::where('user_id', Auth::id())
            ->where('tour_id', $request->tour_id)
            ->exists();

        if ($alreadyReviewed) {
            return back()->with('error', 'You already reviewed this tour.');
        }

        $review = Review::create([
            'tour_id' => $request->tour_id,
            'user_id' => Auth::id(),
            'name'    => Auth::user()->name,
            'email'   => Auth::user()->email,
            'message' => $request->message,
            'rating'  => $request->rating,
        ]);

        // Send notification to all admins
        NotificationService::notifyAdmins(
            'New Tour Review! ⭐',
            Auth::user()->name . ' left a ' . $request->rating . '-star review on a tour.',
            route('admin.dashboard')
        );

        return back()->with('success', 'Review submitted successfully!');
    }

    public function storeHotelReview(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'rating'  => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:1000',
        ]);

        // Prevent duplicate review
        $alreadyReviewed = Review::where('user_id', Auth::id())
            ->where('hotel_id', $request->hotel_id)
            ->exists();

        if ($alreadyReviewed) {
            return back()->with('error', 'You already reviewed this hotel.');
        }

        $review = Review::create([
            'hotel_id' => $request->hotel_id,
            'user_id' => Auth::id(),
            'name'    => Auth::user()->name,
            'email'   => Auth::user()->email,
            'message' => $request->message,
            'rating'  => $request->rating,
        ]);

        // Send notification to all admins
        NotificationService::notifyAdmins(
            'New Hotel Review! ⭐',
            Auth::user()->name . ' left a ' . $request->rating . '-star review on a hotel.',
            route('admin.dashboard')
        );

        return back()->with('success', 'Review submitted successfully!');
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'city'    => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $contact = Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'city'    => $request->city,
            'country' => $request->country,
            'message' => $request->message,
        ]);

        // Send notification to all admins
        NotificationService::notifyAdmins(
            'New Contact Message! 📧',
            'A new contact message from ' . $request->name . ' from ' . $request->city . ', ' . $request->country . ' has been received.',
            route('admin.dashboard')
        );

        return back()->with('success', 'Thank you! Your message has been sent successfully. We will contact you shortly.');
    }
}
