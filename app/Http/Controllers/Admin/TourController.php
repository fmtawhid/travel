<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Itinerary;
use App\Models\Gallery;
use App\Models\Package;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class TourController extends Controller
{
    // List all tours
    public function index()
    {
        $tours = Tour::latest()->paginate(10);
        return view('admin.tours.index', compact('tours'));
    }

    // Show create form
    public function create()
    {
        $packageTypes = Package::all();
        return view('admin.tours.create', compact('packageTypes'));
    }

    // Store new tour
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'location' => 'nullable|string',
            'price' => 'nullable|numeric',
            'discount_price' => 'nullable|numeric',
            'duration' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'itineraries' => 'nullable|array',
            'itineraries.*.day' => 'nullable|integer',
            'itineraries.*.title' => 'nullable|string',
            'itineraries.*.description' => 'nullable|string',
        ]);

        $data = $request->except(['image', 'gallery', 'itineraries', 'included_services']);
        
        // Ensure package_id is properly handled (convert empty string to null)
        if(empty($data['package_id'])){
            $data['package_id'] = null;
        }
        
        // Add includes - map from included_services array
        $includedServices = $request->input('included_services', []);
        $data['include_sightseeing'] = in_array('sightseeing', $includedServices);
        $data['include_hotel'] = in_array('hotel', $includedServices);
        $data['include_transfer'] = in_array('transfer', $includedServices);
        $data['include_luggage'] = in_array('luggage', $includedServices);

        // Handle featured image
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/tours'), $filename);
            $data['image'] = $filename;
        }

        $tour = Tour::create($data);

        // Handle gallery images
        if($request->hasFile('gallery')){
            foreach($request->file('gallery') as $image){
                $filename = time().'_'.uniqid().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/tours/gallery'), $filename);
                Gallery::create([
                    'tour_id' => $tour->id,
                    'image' => $filename,
                ]);
            }
        }

        // Handle itineraries
        if($request->has('itineraries')){
            foreach($request->itineraries as $itinerary){
                if(!empty($itinerary['day']) && !empty($itinerary['title'])){
                    Itinerary::create([
                        'tour_id' => $tour->id,
                        'day_number' => intval($itinerary['day']),
                        'title' => $itinerary['title'],
                        'description' => $itinerary['description'] ?? null,
                    ]);
                }
            }
        }

        // Send notification to all users
        NotificationService::notifyAllUsers(
            'New Tour Package Available! 🎉',
            'A new tour "' . $tour->title . '" in ' . $tour->location . ' is available. Book now!',
            route('package.details', $tour->id),
            $tour->image ? 'uploads/tours/' . $tour->image : null
        );

        return redirect()->route('admin.tours.index')->with('success', 'Tour created successfully');
    }       
    

    // Show edit form
    public function edit(Tour $tour)
    {
        $packageTypes = Package::all();
        $itineraries = $tour->itineraries()->orderBy('day_number')->get();
        $galleries = $tour->galleries()->get();
        return view('admin.tours.edit', compact('tour', 'itineraries', 'galleries', 'packageTypes'));
    }

    // Show tour details
    public function show(Tour $tour)
    {
        $itineraries = $tour->itineraries()->orderBy('day_number')->get();
        $galleries = $tour->galleries()->get();
        return view('admin.tours.show', compact('tour', 'itineraries', 'galleries'));
    }

    // Update tour
    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'location' => 'nullable|string',
            'price' => 'nullable|numeric',
            'discount_price' => 'nullable|numeric',
            'duration' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'package_id' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'itineraries' => 'nullable|array',
            'itineraries.*.day' => 'nullable|integer',
            'itineraries.*.title' => 'nullable|string',
            'itineraries.*.description' => 'nullable|string',
        ]);

        $data = $request->except(['image', 'gallery', 'itineraries', 'included_services']);
        
        // Ensure package_id is properly handled (convert empty string to null)
        if(empty($data['package_id'])){
            $data['package_id'] = null;
        }
        
        // Add includes - map from included_services array
        $includedServices = $request->input('included_services', []);
        $data['include_sightseeing'] = in_array('sightseeing', $includedServices);
        $data['include_hotel'] = in_array('hotel', $includedServices);
        $data['include_transfer'] = in_array('transfer', $includedServices);
        $data['include_luggage'] = in_array('luggage', $includedServices);

        // Handle featured image
        if($request->hasFile('image')){
            // Delete old image
            if($tour->image && file_exists(public_path('uploads/tours/'.$tour->image))){
                unlink(public_path('uploads/tours/'.$tour->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/tours'), $filename);
            $data['image'] = $filename;
        }

        $tour->update($data);

        // Handle gallery images
        if($request->hasFile('gallery')){
            foreach($request->file('gallery') as $image){
                $filename = time().'_'.uniqid().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/tours/gallery'), $filename);
                Gallery::create([
                    'tour_id' => $tour->id,
                    'image' => $filename,
                ]);
            }
        }

        // Handle itineraries
        if($request->has('itineraries')){
            // Delete old itineraries
            $tour->itineraries()->delete();
            
            // Create new itineraries
            foreach($request->itineraries as $itinerary){
                if(!empty($itinerary['day']) && !empty($itinerary['title'])){
                    Itinerary::create([
                        'tour_id' => $tour->id,
                        'day_number' => intval($itinerary['day']),
                        'title' => $itinerary['title'],
                        'description' => $itinerary['description'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.tours.index')->with('success', 'Tour updated successfully');
    }

    // Delete tour
    public function destroy(Tour $tour)
    {
        // Delete featured image
        if($tour->image && file_exists(public_path('uploads/tours/'.$tour->image))){
            unlink(public_path('uploads/tours/'.$tour->image));
        }

        // Delete gallery images
        foreach($tour->galleries as $gallery){
            if($gallery->image && file_exists(public_path('uploads/tours/gallery/'.$gallery->image))){
                unlink(public_path('uploads/tours/gallery/'.$gallery->image));
            }
        }

        $tour->delete();

        return redirect()->route('admin.tours.index')->with('success', 'Tour deleted successfully');
    }

    // Delete gallery image
    public function deleteGallery($id)
    {
        $gallery = Gallery::find($id);
        if($gallery){
            if($gallery->image && file_exists(public_path('uploads/tours/gallery/'.$gallery->image))){
                unlink(public_path('uploads/tours/gallery/'.$gallery->image));
            }
            $gallery->delete();
        }
        return back()->with('success', 'Gallery image deleted');
    }
}

