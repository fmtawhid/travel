@extends('layouts.admin')

@section('content')

<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Edit Tour</h4>
            </div>

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

            <form action="{{ route('admin.tours.update', $tour) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Basic Information --}}
                <h5 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-top: 20px;">Basic Information</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="title" type="text" class="validate" value="{{ old('title', $tour->title) }}" required>
                        <label>Tour Title</label>
                        @error('title')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-field col s4">
                        <input name="location" type="text" class="validate" value="{{ old('location', $tour->location) }}">
                        <label>Location</label>
                        @error('location')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-field col s4">
                        <input name="price" type="number" class="validate" value="{{ old('price', $tour->price) }}" step="0.01">
                        <label>Price ($)</label>
                        @error('price')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="input-field col s4">
                        <input name="discount_price" type="number" class="validate" value="{{ old('discount_price', $tour->discount_price) }}" step="0.01">
                        <label>Discount Price ($)</label>
                        @error('discount_price')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-field col s4">
                        <input name="duration" type="text" class="validate" value="{{ old('duration', $tour->duration) }}" placeholder="e.g., 8N/9D">
                        <label>Duration</label>
                        @error('duration')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-field col s4">
                        <input name="start_date" type="date" value="{{ old('start_date', $tour->start_date) }}">
                        <label class="active">Start Date</label>
                        @error('start_date')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-field col s4">
                        <input name="end_date" type="date" value="{{ old('end_date', $tour->end_date) }}">
                        <label class="active">End Date</label>
                        @error('end_date')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Descriptions --}}
                <h5 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-top: 20px;">Descriptions</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="short_description" class="materialize-textarea">{{ old('short_description', $tour->short_description) }}</textarea>
                        <label>Short Description</label>
                        @error('short_description')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <textarea name="long_description" class="materialize-textarea">{{ old('long_description', $tour->long_description) }}</textarea>
                        <label>Long Description</label>
                        @error('long_description')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- What's Included & Package Type --}}
                <h5 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-top: 20px;">What's Included & Package Type</h5>

                @php
                    // Build selected services array
                    $selectedServices = [];
                    if($tour->include_sightseeing) $selectedServices[] = 'sightseeing';
                    if($tour->include_hotel) $selectedServices[] = 'hotel';
                    if($tour->include_transfer) $selectedServices[] = 'transfer';
                    if($tour->include_luggage) $selectedServices[] = 'luggage';
                @endphp

                <div class="row">
                    <div class="input-field col s6">
                        <select name="included_services[]" multiple>
                            <option value="" disabled>Select Services</option>
                            <option value="sightseeing"
                                {{ in_array('sightseeing', old('included_services', $selectedServices)) ? 'selected' : '' }}>
                                Sightseeing
                            </option>
                            <option value="hotel"
                                {{ in_array('hotel', old('included_services', $selectedServices)) ? 'selected' : '' }}>
                                Hotel
                            </option>
                            <option value="transfer"
                                {{ in_array('transfer', old('included_services', $selectedServices)) ? 'selected' : '' }}>
                                Transfer
                            </option>
                            <option value="luggage"
                                {{ in_array('luggage', old('included_services', $selectedServices)) ? 'selected' : '' }}>
                                Luggage
                            </option>
                        </select>
                        <label>Select Services</label>
                        @error('included_services')
                            <span style="color:red;font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <select name="package_id">
                            <option value="">-- Select Package Type --</option>
                            @foreach ($packageTypes as $packageType)
                                <option value="{{ $packageType->id }}"
                                    {{ old('package_id', $tour->package_id) == $packageType->id ? 'selected' : '' }}>
                                    {{ $packageType->name }}
                                </option>
                            @endforeach
                        </select>
                        <label>Select Package Type</label>
                        @error('package_id')
                            <span style="color:red;font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Images --}}
                <h5 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-top: 20px;">Images</h5>
                <div class="row">
                    {{-- Featured Image --}}
                    <div class="col s12">
                        <div class="file-field input-field">
                            <div class="btn blue">
                                <span>Featured Image</span>
                                <input type="file" name="image" accept="image/*" id="featured-image">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload Featured Image">
                            </div>
                        </div>
                        @error('image')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror

                        {{-- Current Featured Image --}}
                        @if($tour->image)
                            <div style="margin-top: 10px;">
                                <small style="color: gray;">Current Image:</small><br>
                                <img src="{{ asset('uploads/tours/'.$tour->image) }}" width="150" style="border: 1px solid #ccc; padding: 3px;">
                            </div>
                        @endif

                        {{-- Featured Image Preview --}}
                        <div id="featured-preview" style="margin-top: 10px;">
                            <img id="featured-img-tag" src="" style="max-width: 200px; display: none; border: 1px solid #ccc; padding: 3px;">
                        </div>
                    </div>

                    {{-- Gallery Images --}}
                    <div class="col s12" style="margin-top: 15px;">
                        <div class="file-field input-field">
                            <div class="btn green">
                                <span>Gallery Images</span>
                                <input type="file" name="gallery[]" multiple accept="image/*" id="gallery-images">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload Multiple Images">
                            </div>
                        </div>
                        <small style="color: gray;">You can upload multiple images for gallery</small>
                        @error('gallery.*')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror

                        {{-- Existing Gallery --}}
                        @if($galleries->count() > 0)
                            <div style="margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap;">
                                @foreach($galleries as $gallery)
                                    <div style="position: relative; width: 120px;">
                                        <img src="{{ asset('uploads/tours/gallery/'.$gallery->image) }}" width="120" style="border: 1px solid #ccc; padding: 3px;">
                                        <form action="{{ route('admin.tours.deleteGallery', $gallery->id) }}" method="POST" style="position: absolute; top: 0; right: 0;" onsubmit="return confirm('Delete this image?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: red; color: white; border: none; padding: 3px 6px; cursor: pointer; border-radius: 3px; font-weight: bold;">×</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Gallery Preview --}}
                        <div id="gallery-preview" style="margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap;"></div>
                    </div>
                </div>

                {{-- Itineraries --}}
                <h5 style="border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-top: 20px;">Itineraries</h5>
                <div class="row">
                    <div class="col s12">
                        <table class="table" id="itinerary-table">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="itinerary-body">
                                @forelse($itineraries as $itinerary)
                                    <tr class="itinerary-row">
                                        <td><input type="number" name="itineraries[{{ $loop->index }}][day]" value="{{ $itinerary->day_number }}" style="width: 80%;"></td>
                                        <td><input type="text" name="itineraries[{{ $loop->index }}][title]" value="{{ $itinerary->title }}" style="width: 100%;"></td>
                                        <td><input type="text" name="itineraries[{{ $loop->index }}][description]" value="{{ $itinerary->description }}" style="width: 100%;"></td>
                                        <td><button type="button" class="btn btn-danger btn-sm remove-itinerary">Remove</button></td>
                                    </tr>
                                @empty
                                    <tr class="itinerary-row">
                                        <td><input type="number" name="itineraries[0][day]" placeholder="1" style="width: 80%;"></td>
                                        <td><input type="text" name="itineraries[0][title]" placeholder="Day title" style="width: 100%;"></td>
                                        <td><input type="text" name="itineraries[0][description]" placeholder="Description" style="width: 100%;"></td>
                                        <td><button type="button" class="btn btn-danger btn-sm remove-itinerary">Remove</button></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-success btn-sm" id="add-itinerary">+ Add Itinerary</button>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="row" style="margin-top: 30px;">
                    <div class="input-field col s12">
                        <button type="submit" class="waves-effect waves-light btn-large" style="background-color: #007bff;">
                            Update Tour
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    // Featured image preview
    document.getElementById('featured-image').addEventListener('change', function(e){
        const file = e.target.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                const imgTag = document.getElementById('featured-img-tag');
                imgTag.src = e.target.result;
                imgTag.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    // Gallery images preview
    document.getElementById('gallery-images').addEventListener('change', function(e){
        const files = e.target.files;
        const preview = document.getElementById('gallery-preview');
        preview.innerHTML = ''; // Clear previous previews

        Array.from(files).forEach(file => {
            if(file.type.startsWith('image/')){
                const reader = new FileReader();
                reader.onload = function(e){
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '150px';
                    img.style.height = 'auto';
                    img.style.border = '1px solid #ccc';
                    img.style.padding = '3px';
                    img.style.borderRadius = '4px';
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    });

    // Itineraries dynamic add/remove
    let itineraryCount = {{ count($itineraries) }};
    document.getElementById('add-itinerary').addEventListener('click', function() {
        const tbody = document.getElementById('itinerary-body');
        const row = document.createElement('tr');
        row.className = 'itinerary-row';
        row.innerHTML = `
            <td><input type="number" name="itineraries[${itineraryCount}][day]" placeholder="${itineraryCount+1}" style="width: 80%;"></td>
            <td><input type="text" name="itineraries[${itineraryCount}][title]" placeholder="Day title" style="width: 100%;"></td>
            <td><input type="text" name="itineraries[${itineraryCount}][description]" placeholder="Description" style="width: 100%;"></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-itinerary">Remove</button></td>
        `;
        tbody.appendChild(row);
        itineraryCount++;
    });

    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('remove-itinerary')) {
            e.preventDefault();
            e.target.closest('tr').remove();
        }
    });
</script>
<script>
// Initialize Materialize after a small delay to ensure library is loaded
setTimeout(function() {
    if(typeof M !== 'undefined') {
        var elems = document.querySelectorAll('select');
        M.FormSelect.init(elems);
    }
}, 100);

// Debug form submission
if(document.querySelector('form')) {
    document.querySelector('form').addEventListener('submit', function(e) {
        console.log('Form submit triggered');
        console.log('Form data valid:', this.checkValidity());
        console.log('Title field:', document.querySelector('input[name="title"]').value);
        console.log('Package ID:', document.querySelector('select[name="package_id"]').value);
    }, false);
}
</script>

@endsection
