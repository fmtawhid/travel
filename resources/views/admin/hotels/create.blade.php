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
                    <a href="#">Add Hotel</a>
                </li>
            </ul>
        </div>

        <div class="sb2-2-add-blog sb2-2-1">
            <h2>Add Hotel Details</h2>

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

            <form action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                                        <input name="name" type="text" class="validate" value="{{ old('name') }}" required>
                                        <label>Hotel Name</label>
                                        @error('name')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="location" type="text" class="validate" value="{{ old('location') }}">
                                        <label>Location</label>
                                        @error('location')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="contact_person" type="text" class="validate"
                                            value="{{ old('contact_person') }}">
                                        <label>Contact Person</label>
                                        @error('contact_person')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <textarea name="description"
                                            class="materialize-textarea">{{ old('description') }}</textarea>
                                        <label>Description</label>
                                        @error('description')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row" style="margin-top: 20px;">
                                        <div class="input-field col s12">
                                            <select multiple name="amenities[]">
                                                <option value="" disabled>Select Amenities</option>
                                                @foreach($amenities as $amenity)
                                                    <option value="{{ $amenity->id }}" {{ in_array($amenity->id, old('amenities', $selectedAmenities ?? [])) ? 'selected' : '' }}>
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
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="room-types-body">
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
                                            value="{{ old('facebook_url') }}">
                                        <label>Facebook URL</label>
                                        @error('facebook_url')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="google_plus_url" type="url" class="validate"
                                            value="{{ old('google_plus_url') }}">
                                        <label>Google Plus URL</label>
                                        @error('google_plus_url')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="twitter_url" type="url" class="validate"
                                            value="{{ old('twitter_url') }}">
                                        <label>Twitter URL</label>
                                        @error('twitter_url')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="linkedin_url" type="url" class="validate"
                                            value="{{ old('linkedin_url') }}">
                                        <label>LinkedIn URL</label>
                                        @error('linkedin_url')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="vk_url" type="url" class="validate" value="{{ old('vk_url') }}">
                                        <label>VK (VKontakte) URL</label>
                                        @error('vk_url')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="whatsapp_number" type="text" class="validate"
                                            value="{{ old('whatsapp_number') }}">
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
                                            value="{{ old('contact_name') }}">
                                        <label>Contact Name</label>
                                        @error('contact_name')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="alter_contact_name" type="text" class="validate"
                                            value="{{ old('alter_contact_name') }}">
                                        <label>Alternate Contact Name</label>
                                        @error('alter_contact_name')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="phone" type="text" class="validate" value="{{ old('phone') }}">
                                        <label>Phone</label>
                                        @error('phone')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="mobile" type="text" class="validate" value="{{ old('mobile') }}">
                                        <label>Mobile</label>
                                        @error('mobile')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="email" type="email" class="validate" value="{{ old('email') }}">
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
                            Save Hotel
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
        let roomTypeCount = 1;
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
                    <input type="file" name="room_types[${roomTypeCount}][images][]" accept="image/*" multiple class="room-type-images" style="padding: 5px; font-size: 12px;">
                    <small style="display: block; margin-top: 5px; color: #666;">Multiple images allowed</small>
                </td>
                <td><button type="button" class="btn btn-danger btn-sm remove-room-type">Remove</button></td>
            `;
            tbody.appendChild(row);
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