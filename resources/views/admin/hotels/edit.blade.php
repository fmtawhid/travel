@extends('layouts.admin')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="sb2-2">
        <div class="sb2-2-2">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                </li>
                <li class="active-bre">
                    <a href="#">Edit Hotel</a>
                </li>
            </ul>
        </div>

        <div class="sb2-2-add-blog sb2-2-1">
            <h2>Edit Hotel Details</h2>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <ul class="nav nav-tabs tab-list">
                    <li class="active">
                        <a data-toggle="tab" href="#home"><i class="fa fa-info" aria-hidden="true"></i>
                            <span>Detail</span></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu1"><i class="fa fa-bed" aria-hidden="true"></i> <span>Room
                                Type</span></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu2"><i class="fa fa-picture-o" aria-hidden="true"></i> <span>Photo
                                Gallery</span></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu3"><i class="fa fa-facebook" aria-hidden="true"></i> <span>Social
                                Media</span></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu4"><i class="fa fa-phone" aria-hidden="true"></i> <span>Contact
                                Info</span></a>
                    </li>
                </ul>

                <div class="tab-content">

                    {{-- DETAILS TAB --}}
                    <div id="home" class="tab-pane fade in active">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Hotel Information</h4>
                            </div>
                            <div class="bor">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="name" type="text" class="validate"
                                            value="{{ old('name', $hotel->name) }}" required>
                                        <label>Hotel Name</label>
                                        @error('name')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="location" type="text" class="validate"
                                            value="{{ old('location', $hotel->location) }}">
                                        <label>Location</label>
                                        @error('location')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="contact_person" type="text" class="validate"
                                            value="{{ old('contact_person', $hotel->contact_person) }}">
                                        <label>Contact Person</label>
                                        @error('contact_person')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <textarea name="description"
                                            class="materialize-textarea">{{ old('description', $hotel->description) }}</textarea>
                                        <label>Description</label>
                                        @error('description')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                      
                                    {{-- HOTEL AMENITIES --}}
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="input-field col s12">
                                            <select multiple name="amenities[]">
                                                <option value="" disabled>Select Amenities</option>
                                                @foreach($amenities as $amenity)
                                                    <option value="{{ $amenity->id }}" {{ (is_array($hotel->amenities) && in_array($amenity->id, $hotel->amenities)) ? 'selected' : '' }}>
                                                        {{ $amenity->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label>Hotel Amenities</label>

                                            @error('amenities')
                                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                {{-- Hotel Image --}}
                                <div class="row">
                                    <div class="input-field col s12">
                                        <h5
                                            style="margin: 20px 0 10px 0; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                                            Hotel Featured Image</h5>

                                        @if($hotel->image && file_exists(public_path('uploads/hotels/' . $hotel->image)))
                                            <div style="margin-bottom: 15px;">
                                                <img src="{{ asset('uploads/hotels/' . $hotel->image) }}"
                                                    style="max-width: 200px; border: 1px solid #ccc; padding: 3px; border-radius: 3px;">
                                                <p style="font-size: 12px; color: #666; margin-top: 5px;">Current Image</p>
                                            </div>
                                        @endif

                                        <div class="file-field input-field">
                                            <div class="btn blue">
                                                <span>Upload Image</span>
                                                <input type="file" name="image" accept="image/*" id="hotel-image">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text"
                                                    placeholder="Upload Hotel Image">
                                            </div>
                                        </div>
                                        @error('image')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror

                                        <div id="image-preview" style="margin-top: 10px;">
                                            <img id="hotel-img-tag" src=""
                                                style="max-width: 200px; display: none; border: 1px solid #ccc; padding: 3px; border-radius: 3px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ROOM TYPE TAB --}}
                    <div id="menu1" class="tab-pane fade">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Hotel Room Types</h4>
                            </div>
                            <div class="bor">
                                <div class="row">
                                    <div class="col s12">
                                        <table class="table" id="room-types-table">
                                            <thead>
                                                <tr>
                                                    <th>Room Type</th>
                                                    <th>Price</th>
                                                    <th>Description</th>
                                                    <th>Amenities</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="room-types-body">
                                                @if($hotel->roomTypes && $hotel->roomTypes->count() > 0)
                                                    @foreach($hotel->roomTypes as $index => $room)
                                                        <tr class="room-type-row">
                                                            <input type="hidden" name="room_types[{{ $index }}][id]" value="{{ $room->id }}">
                                                            <td><input type="text" name="room_types[{{ $index }}][room_type]"
                                                                    value="{{ $room->room_type }}"
                                                                    style="width: 100%; padding: 5px;"></td>
                                                            <td><input type="number" name="room_types[{{ $index }}][price]"
                                                                    value="{{ $room->price }}" step="0.01"
                                                                    style="width: 100%; padding: 5px;"></td>
                                                            <td><input type="text" name="room_types[{{ $index }}][description]"
                                                                    value="{{ $room->description }}"
                                                                    style="width: 100%; padding: 5px;"></td>
                                                            <td>
                                                                <select multiple name="room_types[{{ $index }}][amenities][]" style="width: 100%; padding: 5px;">
                                                                    <option value="" disabled>Select Amenities</option>
                                                                    @foreach($amenities as $amenity)
                                                                        <option value="{{ $amenity->id }}" {{ (is_array($room->amenities) && in_array($amenity->id, $room->amenities)) ? 'selected' : '' }}>
                                                                            {{ $amenity->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                @if($room->images)
                                                                    <div style="margin-bottom: 10px;">
                                                                        @foreach($room->images as $img)
                                                                            <div
                                                                                style="display: inline-block; position: relative; margin-right: 5px; margin-bottom: 5px;">
                                                                                <img src="{{ asset('uploads/hotels/room_types/' . $img) }}"
                                                                                    style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #ddd; border-radius: 3px;">
                                                                                <a href="javascript:void(0)"
                                                                                    onclick="deleteRoomImage('{{ $room->id }}', '{{ $img }}')"
                                                                                    style="position: absolute; top: -8px; right: -8px; background: #dc3545; color: white; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; cursor: pointer;">×</a>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                                <input type="file" name="room_types[{{ $index }}][images][]"
                                                                    accept="image/*" multiple class="room-type-images"
                                                                    style="padding: 5px; font-size: 12px;">
                                                                <small
                                                                    style="display: block; margin-top: 5px; color: #666;">Multiple
                                                                    images allowed</small>
                                                            </td>
                                                            <td><button type="button"
                                                                    class="btn btn-danger btn-sm remove-room-type">Remove</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="room-type-row">
                                                        <td><input type="text" name="room_types[0][room_type]"
                                                                placeholder="e.g., Deluxe" style="width: 100%; padding: 5px;">
                                                        </td>
                                                        <td><input type="number" name="room_types[0][price]" placeholder="0.00"
                                                                step="0.01" style="width: 100%; padding: 5px;"></td>
                                                        <td><input type="text" name="room_types[0][description]"
                                                                placeholder="Description" style="width: 100%; padding: 5px;">
                                                        </td>
                                                        <td>
                                                            <select multiple name="room_types[0][amenities][]" style="width: 100%; padding: 5px;">
                                                                <option value="" disabled>Select Amenities</option>
                                                                @foreach($amenities as $amenity)
                                                                    <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="file" name="room_types[0][images][]" accept="image/*"
                                                                multiple class="room-type-images"
                                                                style="padding: 5px; font-size: 12px;">
                                                            <small
                                                                style="display: block; margin-top: 5px; color: #666;">Multiple
                                                                images allowed</small>
                                                        </td>
                                                        <td><button type="button"
                                                                class="btn btn-danger btn-sm remove-room-type">Remove</button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-success btn-sm" id="add-room-type">+ Add Room
                                            Type</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PHOTO GALLERY TAB --}}
                    <div id="menu2" class="tab-pane fade">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Photo Gallery</h4>
                            </div>
                            <div class="bor">
                                <div class="row">
                                    <div class="input-field col s12">
                                        {{-- Display existing gallery images --}}
                                        @if($hotel->gallery_images && is_array($hotel->gallery_images))
                                            <div style="margin-bottom: 15px;">
                                                <p style="font-weight: bold; margin-bottom: 10px;">Existing Gallery Images:</p>
                                                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                                                    @foreach($hotel->gallery_images as $img)
                                                        @if(is_string($img))
                                                            <div style="position: relative; display: inline-block;">
                                                                <img src="{{ asset('uploads/hotels/gallery/' . $img) }}"
                                                                    style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #ddd; border-radius: 3px;">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        <div class="file-field input-field">
                                            <div class="btn green">
                                                <span>Upload Images</span>
                                                <input type="file" name="gallery_images[]" multiple accept="image/*">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text"
                                                    placeholder="Upload one or more gallery images">
                                            </div>
                                        </div>
                                        @error('gallery_images')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SOCIAL MEDIA TAB --}}
                    <div id="menu3" class="tab-pane fade">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Social Media Links</h4>
                            </div>
                            <div class="bor">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="facebook_url" type="url" class="validate"
                                            value="{{ old('facebook_url', $hotel->facebook_url) }}">
                                        <label>Facebook URL</label>
                                        @error('facebook_url')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="google_plus_url" type="url" class="validate"
                                            value="{{ old('google_plus_url', $hotel->google_plus_url) }}">
                                        <label>Google Plus URL</label>
                                        @error('google_plus_url')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="twitter_url" type="url" class="validate"
                                            value="{{ old('twitter_url', $hotel->twitter_url) }}">
                                        <label>Twitter URL</label>
                                        @error('twitter_url')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="linkedin_url" type="url" class="validate"
                                            value="{{ old('linkedin_url', $hotel->linkedin_url) }}">
                                        <label>LinkedIn URL</label>
                                        @error('linkedin_url')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="vk_url" type="url" class="validate"
                                            value="{{ old('vk_url', $hotel->vk_url) }}">
                                        <label>VK (VKontakte) URL</label>
                                        @error('vk_url')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="whatsapp_number" type="text" class="validate"
                                            value="{{ old('whatsapp_number', $hotel->whatsapp_number) }}">
                                        <label>WhatsApp Number</label>
                                        @error('whatsapp_number')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- CONTACT INFO TAB --}}
                    <div id="menu4" class="tab-pane fade">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Contact Information</h4>
                            </div>
                            <div class="bor">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input name="contact_name" type="text" class="validate"
                                            value="{{ old('contact_name', $hotel->contact_name) }}">
                                        <label>Contact Name</label>
                                        @error('contact_name')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="alter_contact_name" type="text" class="validate"
                                            value="{{ old('alter_contact_name', $hotel->alter_contact_name) }}">
                                        <label>Alternate Contact Name</label>
                                        @error('alter_contact_name')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="phone" type="text" class="validate"
                                            value="{{ old('phone', $hotel->phone) }}">
                                        <label>Phone</label>
                                        @error('phone')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="mobile" type="text" class="validate"
                                            value="{{ old('mobile', $hotel->mobile) }}">
                                        <label>Mobile</label>
                                        @error('mobile')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="email" type="email" class="validate"
                                            value="{{ old('email', $hotel->email) }}">
                                        <label>Email</label>
                                        @error('email')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="waves-effect waves-light btn-large" style="background-color: #007bff;">
                            Update Hotel
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        // Initialize Materialize elements
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize select elements
            const selects = document.querySelectorAll('select');
            selects.forEach(select => {
                M.FormSelect.init(select);
            });

            // Initialize textareas
            const textareas = document.querySelectorAll('.materialize-textarea');
            M.textareaAutoResize(textareas);
        });

        // Delete room type image
        function deleteRoomImage(roomTypeId, filename) {
            if (confirm('Are you sure you want to delete this image?')) {
                fetch('/admin/hotels/delete-room-image', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        room_type_id: roomTypeId,
                        filename: filename
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Image deleted successfully');
                            location.reload();
                        } else {
                            alert('Failed to delete image');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        // Image preview
        document.getElementById('hotel-image').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imgTag = document.getElementById('hotel-img-tag');
                    imgTag.src = e.target.result;
                    imgTag.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });

        // Room Types Management
        let roomTypeCount = {{ $hotel->roomTypes ? $hotel->roomTypes->count() : 1 }};
        document.getElementById('add-room-type').addEventListener('click', function (e) {
            e.preventDefault();
            const tbody = document.getElementById('room-types-body');
            const row = document.createElement('tr');
            row.className = 'room-type-row';
            row.innerHTML = `
                    <td><input type="text" name="room_types[${roomTypeCount}][room_type]" placeholder="e.g., Deluxe" style="width: 100%; padding: 5px;"></td>
                    <td><input type="number" name="room_types[${roomTypeCount}][price]" placeholder="0.00" step="0.01" style="width: 100%; padding: 5px;"></td>
                    <td><input type="text" name="room_types[${roomTypeCount}][description]" placeholder="Description" style="width: 100%; padding: 5px;"></td>
                    <td>
                        <select multiple name="room_types[${roomTypeCount}][amenities][]" style="width: 100%; padding: 5px;">
                            <option value="" disabled>Select Amenities</option>
                            @foreach($amenities as $amenity)
                                <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="file" name="room_types[${roomTypeCount}][images][]" accept="image/*" multiple class="room-type-images" style="padding: 5px; font-size: 12px;">
                        <small style="display: block; margin-top: 5px; color: #666;">Multiple images allowed</small>
                    </td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-room-type">Remove</button></td>
                `;
            tbody.appendChild(row);
            // Re-initialize select elements
            const newSelects = row.querySelectorAll('select');
            newSelects.forEach(select => {
                M.FormSelect.init(select);
            });
            roomTypeCount++;
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-room-type')) {
                e.preventDefault();
                e.target.closest('tr').remove();
            }
        });
    </script>

@endsection