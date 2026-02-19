<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\RoomType;
use App\Models\HotelAmenity;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::latest()->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        $amenities = HotelAmenity::orderBy('name')->get();
        return view('admin.hotels.create', compact('amenities'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'facebook_url' => 'nullable|url',
            'google_plus_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'vk_url' => 'nullable|url',
            'whatsapp_number' => 'nullable|string|max:20',
            'contact_name' => 'nullable|string|max:255',
            'alter_contact_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'room_types' => 'nullable|array',
            'room_types.*.room_type' => 'nullable|string',
            'room_types.*.price' => 'nullable|numeric',
            'room_types.*.description' => 'nullable|string',
            'room_types.*.amenities' => 'nullable|array',
            'room_types.*.amenities.*' => 'integer|exists:hotel_amenities,id',
            'amenities' => 'nullable|array',
            'amenities.*' => 'integer|exists:hotel_amenities,id',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/hotels'), $filename);
            $data['image'] = $filename;
        }

        // Gallery images - process files and store filenames
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            $galleryPath = public_path('uploads/hotels/gallery');
            if (!file_exists($galleryPath)) {
                mkdir($galleryPath, 0755, true);
            }
            foreach ($request->file('gallery_images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($galleryPath, $filename);
                $galleryImages[] = $filename;
            }
        }
        if (!empty($galleryImages)) {
            $data['gallery_images'] = $galleryImages;
        }

        // Amenities as array
        if ($request->has('amenities')) {
            $data['amenities'] = $request->amenities;
        }

        $hotel = Hotel::create($data);

        // Create room types if provided
        if ($request->filled('room_types')) {
            foreach ($request->room_types as $roomIndex => $room) {
                if ($room['room_type']) {
                    $roomData = [
                        'room_type' => $room['room_type'],
                        'price' => $room['price'] ?? 0,
                        'description' => $room['description'] ?? null,
                    ];

                    // Ensure room types directory exists
                    $roomTypePath = public_path('uploads/hotels/room_types');
                    if (!file_exists($roomTypePath)) {
                        mkdir($roomTypePath, 0755, true);
                    }

                    // Handle multiple room type image uploads
                    $uploadedImages = [];
                    if (isset($_FILES['room_types']) && isset($_FILES['room_types']['tmp_name'][$roomIndex]['images'])) {
                        $files = $_FILES['room_types'];
                        $tmpFiles = $files['tmp_name'][$roomIndex]['images'];
                        $fileNames = $files['name'][$roomIndex]['images'];
                        $fileErrors = $files['error'][$roomIndex]['images'];

                        // Ensure tmp_name is an array
                        if (is_array($tmpFiles)) {
                            foreach ($tmpFiles as $idx => $tmpFile) {
                                if ($fileErrors[$idx] === UPLOAD_ERR_OK && !empty($tmpFile)) {
                                    $filename = time() . '_' . basename($fileNames[$idx]);
                                    if (move_uploaded_file($tmpFile, $roomTypePath . '/' . $filename)) {
                                        $uploadedImages[] = $filename;
                                    }
                                }
                            }
                        } elseif (!empty($tmpFiles) && $fileErrors === UPLOAD_ERR_OK) {
                            // Single file case
                            $filename = time() . '_' . basename($fileNames);
                            if (move_uploaded_file($tmpFiles, $roomTypePath . '/' . $filename)) {
                                $uploadedImages[] = $filename;
                            }
                        }
                    }

                    if (!empty($uploadedImages)) {
                        $roomData['images'] = $uploadedImages;
                    }

                    // Handle room type amenities
                    if (!empty($room['amenities'])) {
                        $roomData['amenities'] = $room['amenities'];
                    }

                    $hotel->roomTypes()->create($roomData);
                }
            }
        }

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully.');
    }

    public function show(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.hotels.show', compact('hotel'));
    }

    public function edit(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        $amenities = HotelAmenity::orderBy('name')->get();
        return view('admin.hotels.edit', compact('hotel', 'amenities'));
    }

    public function update(Request $request, string $id)
    {
        $hotel = Hotel::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'facebook_url' => 'nullable|url',
            'google_plus_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'vk_url' => 'nullable|url',
            'whatsapp_number' => 'nullable|string|max:20',
            'contact_name' => 'nullable|string|max:255',
            'alter_contact_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'room_types' => 'nullable|array',
            'room_types.*.room_type' => 'nullable|string',
            'room_types.*.price' => 'nullable|numeric',
            'room_types.*.description' => 'nullable|string',
            'room_types.*.amenities' => 'nullable|array',
            'room_types.*.amenities.*' => 'integer|exists:hotel_amenities,id',
            'amenities' => 'nullable|array',
            'amenities.*' => 'integer|exists:hotel_amenities,id',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($hotel->image && file_exists(public_path('uploads/hotels/' . $hotel->image))) {
                unlink(public_path('uploads/hotels/' . $hotel->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/hotels'), $filename);
            $data['image'] = $filename;
        }

        // Gallery images - process new files and store filenames
        $galleryImages = $hotel->gallery_images ?? [];
        if ($request->hasFile('gallery_images')) {
            $galleryPath = public_path('uploads/hotels/gallery');
            if (!file_exists($galleryPath)) {
                mkdir($galleryPath, 0755, true);
            }
            foreach ($request->file('gallery_images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($galleryPath, $filename);
                $galleryImages[] = $filename;
            }
            $data['gallery_images'] = $galleryImages;
        }

        // Amenities as array
        if ($request->has('amenities')) {
            $data['amenities'] = $request->amenities;
        }

        $hotel->update($data);

        // Update room types if provided
        if ($request->filled('room_types')) {
            $submittedRoomIds = [];
            foreach ($request->room_types as $roomIndex => $room) {
                if ($room['room_type']) {
                    $roomData = [
                        'room_type' => $room['room_type'],
                        'price' => $room['price'] ?? 0,
                        'description' => $room['description'] ?? null,
                    ];

                    // Ensure room types directory exists
                    $roomTypePath = public_path('uploads/hotels/room_types');
                    if (!file_exists($roomTypePath)) {
                        mkdir($roomTypePath, 0755, true);
                    }

                    // Handle multiple room type image uploads
                    $uploadedImages = [];
                    if (isset($_FILES['room_types']) && isset($_FILES['room_types']['tmp_name'][$roomIndex]['images'])) {
                        $files = $_FILES['room_types'];
                        $tmpFiles = $files['tmp_name'][$roomIndex]['images'];
                        $fileNames = $files['name'][$roomIndex]['images'];
                        $fileErrors = $files['error'][$roomIndex]['images'];

                        // Ensure tmp_name is an array
                        if (is_array($tmpFiles)) {
                            foreach ($tmpFiles as $idx => $tmpFile) {
                                if ($fileErrors[$idx] === UPLOAD_ERR_OK && !empty($tmpFile)) {
                                    $filename = time() . '_' . basename($fileNames[$idx]);
                                    if (move_uploaded_file($tmpFile, $roomTypePath . '/' . $filename)) {
                                        $uploadedImages[] = $filename;
                                    }
                                }
                            }
                        } elseif (!empty($tmpFiles) && $fileErrors === UPLOAD_ERR_OK) {
                            // Single file case
                            $filename = time() . '_' . basename($fileNames);
                            if (move_uploaded_file($tmpFiles, $roomTypePath . '/' . $filename)) {
                                $uploadedImages[] = $filename;
                            }
                        }
                    }

                    if (!empty($uploadedImages)) {
                        $roomData['images'] = $uploadedImages;
                    }

                    // Handle room type amenities
                    if (!empty($room['amenities'])) {
                        $roomData['amenities'] = $room['amenities'];
                    }

                    // If room ID exists, update; otherwise create
                    if (!empty($room['id'])) {
                        $roomType = RoomType::find($room['id']);
                        if ($roomType) {
                            // Keep existing images if no new images uploaded
                            if (empty($uploadedImages)) {
                                unset($roomData['images']);
                            }
                            $roomType->update($roomData);
                            $submittedRoomIds[] = $room['id'];
                        }
                    } else {
                        $createdRoom = $hotel->roomTypes()->create($roomData);
                        $submittedRoomIds[] = $createdRoom->id;
                    }
                }
            }
            // Delete room types that were not in the submission
            $hotel->roomTypes()->whereNotIn('id', $submittedRoomIds)->delete();
        }

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully.');
    }

    public function destroy(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully.');
    }

    public function deleteRoomImage(Request $request)
    {
        $roomType = RoomType::findOrFail($request->room_type_id);
        $images = $roomType->images ?? [];
        
        $images = array_filter($images, function($img) use ($request) {
            return $img !== $request->filename;
        });

        if (!empty($images)) {
            $roomType->update(['images' => array_values($images)]);
        } else {
            $roomType->update(['images' => null]);
        }

        // Delete file from storage
        $filePath = public_path('uploads/hotels/room_types/' . $request->filename);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return response()->json(['success' => true]);
    }
}
