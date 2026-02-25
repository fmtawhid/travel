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
                    <a href="#">Edit About Page</a>
                </li>
            </ul>
        </div>

        <div class="sb2-2-add-blog sb2-2-1">
            <h2><i class="fa fa-edit"></i> Edit About Page</h2>

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

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.about-page.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- BASIC INFORMATION SECTION -->
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="fa fa-info-circle"></i> Basic Information
                                </h5>
                            </div>
                            <div class="card-body">
                                <!-- Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label fw-bold">
                                        <i class="fa fa-heading"></i> Page Title
                                    </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $aboutPage->title ?? '') }}"
                                        placeholder="e.g., Welcome to Our Travel Company" required>
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="text-muted">This will be displayed as the main heading</small>
                                </div>

                                <!-- Subtitle -->
                                <div class="mb-3">
                                    <label for="subtitle" class="form-label fw-bold">
                                        <i class="fa fa-quote-left"></i> Subtitle
                                    </label>
                                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                        id="subtitle" name="subtitle" value="{{ old('subtitle', $aboutPage->subtitle ?? '') }}"
                                        placeholder="e.g., Your trusted travel partner worldwide">
                                    @error('subtitle')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="text-muted">Optional secondary heading</small>
                                </div>

                                <!-- Phone -->
                                <div class="mb-3">
                                    <label for="phone" class="form-label fw-bold">
                                        <i class="fa fa-phone"></i> Contact Phone Number
                                    </label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone', $aboutPage->phone ?? '') }}"
                                        placeholder="e.g., +1-800-TRAVEL-1">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="text-muted">This will be displayed as a clickable link</small>
                                </div>
                            </div>
                        </div>

                        <!-- DESCRIPTION SECTION -->
                        <div class="card mb-4">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">
                                    <i class="fa fa-file-text"></i> Main Description
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="description" class="form-label fw-bold">
                                        <i class="fa fa-paragraph"></i> About Page Content
                                    </label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description" rows="10"
                                        placeholder="Write your about page content here... You can use multiple paragraphs."
                                        required>{{ old('description', $aboutPage->description ?? '') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="text-muted">
                                        <i class="fa fa-info-circle"></i> This is the main content section.
                                        Line breaks will be preserved when displayed.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- SERVICES SECTION -->
                        <div class="card mb-4">
                            <div class="card-header bg-warning text-dark">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">
                                        <i class="fa fa-cogs"></i> Services
                                    </h5>
                                    <button type="button" class="btn btn-success btn-sm" id="add-service-btn">
                                        <i class="fa fa-plus"></i> Add Service
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="services-container">
                                    @if($aboutPage && $aboutPage->services && count($aboutPage->services) > 0)
                                        @foreach($aboutPage->services as $index => $service)
                                            <div class="service-item card mb-3 p-3 border-start border-4" style="border-color: #ffc107 !important;">
                                                <button type="button" class="btn btn-danger btn-sm float-end remove-service-btn">
                                                    <i class="fa fa-trash"></i> Remove
                                                </button>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label fw-bold">Icon</label>
                                                        <input type="text" class="form-control service-icon"
                                                            name="services[{{ $index }}][icon]"
                                                            value="{{ $service['icon'] ?? '' }}"
                                                            placeholder="e.g., fa fa-flag-o">
                                                        <small class="text-muted">FontAwesome icon class</small>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label class="form-label fw-bold">Service Title</label>
                                                        <input type="text" class="form-control service-title"
                                                            name="services[{{ $index }}][title]"
                                                            value="{{ $service['title'] ?? '' }}"
                                                            placeholder="e.g., Travel Booking">
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="form-label fw-bold">Description</label>
                                                    <textarea class="form-control service-description"
                                                        name="services[{{ $index }}][description]"
                                                        rows="3"
                                                        placeholder="Service description">{{ $service['description'] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="alert alert-info" role="alert">
                                    <i class="fa fa-lightbulb-o"></i> <strong>Tip:</strong>
                                    Add up to 6 services. Each service should have an icon class, title, and description.
                                </div>
                            </div>
                        </div>

                        <!-- IMAGE SECTION -->
                        <div class="card mb-4">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0">
                                    <i class="fa fa-image"></i> About Page Image
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="image" class="form-label fw-bold">
                                        <i class="fa fa-picture-o"></i> Upload New Image
                                    </label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image" accept="image/*">
                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="text-muted">
                                        <i class="fa fa-info-circle"></i> Recommended size: 1200x600px (JPG, PNG, WebP). Max 5MB
                                    </small>
                                </div>

                                @if($aboutPage && $aboutPage->image)
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Current Image</label><br>
                                        <div class="border p-3 rounded">
                                            <img src="{{ asset($aboutPage->image) }}" alt="About Page Image"
                                                 style="max-width: 100%; max-height: 300px; object-fit: cover; border-radius: 5px;">
                                            <div class="mt-3">
                                                <label class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="remove_image" value="1">
                                                    <span class="form-check-label text-danger">
                                                        <i class="fa fa-trash"></i> Remove current image
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex gap-2 justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fa fa-save"></i> Save About Page
                                    </button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .service-item {
        background-color: #f8f9fa;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .service-item:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        background-color: #fff;
    }

    .card-header {
        font-weight: bold;
    }

    .card {
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border: none;
        border-radius: 10px;
    }

    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }

    .btn {
        border-radius: 5px;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>

<script>
let serviceCount = {{ $aboutPage && $aboutPage->services ? count($aboutPage->services) : 0 }};

// Add Service Button
document.getElementById('add-service-btn').addEventListener('click', function(e) {
    e.preventDefault();
    const container = document.getElementById('services-container');
    const serviceItem = document.createElement('div');
    serviceItem.className = 'service-item card mb-3 p-3 border-start border-4';
    serviceItem.style.borderColor = '#ffc107 !important';
    serviceItem.innerHTML = `
        <button type="button" class="btn btn-danger btn-sm float-end remove-service-btn">
            <i class="fa fa-trash"></i> Remove
        </button>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label fw-bold">Icon</label>
                <input type="text" class="form-control service-icon"
                    name="services[${serviceCount}][icon]"
                    placeholder="e.g., fa fa-flag-o">
                <small class="text-muted">FontAwesome icon class</small>
            </div>
            <div class="col-md-8">
                <label class="form-label fw-bold">Service Title</label>
                <input type="text" class="form-control service-title"
                    name="services[${serviceCount}][title]"
                    placeholder="e.g., Travel Booking">
            </div>
        </div>
        <div class="mt-3">
            <label class="form-label fw-bold">Description</label>
            <textarea class="form-control service-description"
                name="services[${serviceCount}][description]"
                rows="3"
                placeholder="Service description"></textarea>
        </div>
    `;
    container.appendChild(serviceItem);
    serviceCount++;
});

// Remove Service Button
document.addEventListener('click', function(e) {
    if (e.target.closest('.remove-service-btn')) {
        e.preventDefault();
        e.target.closest('.service-item').remove();
    }
});
</script>
@endsection
