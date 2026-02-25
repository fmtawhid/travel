@extends('layouts.admin')

@section('content')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

<div class="sb2-2">

    {{-- Breadcrumb --}}
    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="active-bre">
                <a href="#">Edit About Page</a>
            </li>
        </ul>
    </div>

    <div class="sb2-2-add-blog sb2-2-1">
        <h2>Edit About Page</h2>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0;padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.about-page.update') }}" method="POST">
            @csrf

            <ul class="nav nav-tabs tab-list">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <i class="fa fa-info"></i> <span>Main Info</span>
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#services">
                        <i class="fa fa-cogs"></i> <span>Services</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">

                {{-- MAIN INFO TAB --}}
                <div id="home" class="tab-pane fade in active">
                    <div class="box-inn-sp">
                        <div class="inn-title">
                            <h4>Main About Info</h4>
                        </div>
                        <div class="bor p-3">

                            {{-- Title --}}
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" 
                                       value="{{ old('title', $aboutPage->title ?? '') }}" required>
                            </div>

                            {{-- Subtitle --}}
                            <div class="mb-3">
                                <label class="form-label">Subtitle</label>
                                <input type="text" name="subtitle" class="form-control" 
                                       value="{{ old('subtitle', $aboutPage->subtitle ?? '') }}">
                            </div>

                            {{-- Description --}}
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="6" required>{{ old('description', $aboutPage->description ?? '') }}</textarea>
                            </div>

                            {{-- Phone --}}
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" 
                                       value="{{ old('phone', $aboutPage->phone ?? '') }}">
                            </div>

                        </div>
                    </div>
                </div>

                {{-- SERVICES TAB --}}
                <div id="services" class="tab-pane fade">
                    <div class="box-inn-sp">
                        <div class="inn-title">
                            <h4>Services Section</h4>
                        </div>
                        <div class="bor p-3">

                            <div id="services-container">
                                @if($aboutPage && $aboutPage->services)
                                    @foreach($aboutPage->services as $index => $service)
                                        <div class="card p-3 mb-3 service-item">
                                            <button type="button" class="btn btn-danger btn-sm float-end remove-service-btn">
                                                <i class="fa fa-trash"></i> Remove
                                            </button>

                                            <div class="mb-2">
                                                <label>Service Icon (FontAwesome)</label>
                                                <input type="text" name="services[{{ $index }}][icon]" class="form-control"
                                                       value="{{ $service['icon'] ?? '' }}" placeholder="e.g., fa fa-flag-o">
                                            </div>

                                            <div class="mb-2">
                                                <label>Service Title</label>
                                                <input type="text" name="services[{{ $index }}][title]" class="form-control"
                                                       value="{{ $service['title'] ?? '' }}">
                                            </div>

                                            <div class="mb-2">
                                                <label>Service Description</label>
                                                <textarea name="services[{{ $index }}][description]" class="form-control" rows="3">{{ $service['description'] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <button type="button" class="btn btn-success btn-sm mt-2" id="add-service-btn">
                                <i class="fa fa-plus"></i> Add Service
                            </button>

                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Changes
                </button>
            </div>

        </form>
    </div>
</div>

{{-- JS for dynamic services --}}
<script>
    let serviceCount = {{ $aboutPage && $aboutPage->services ? count($aboutPage->services) : 0 }};
    
    document.getElementById('add-service-btn').addEventListener('click', function() {
        const container = document.getElementById('services-container');
        const div = document.createElement('div');
        div.className = 'card p-3 mb-3 service-item';
        div.innerHTML = `
            <button type="button" class="btn btn-danger btn-sm float-end remove-service-btn">
                <i class="fa fa-trash"></i> Remove
            </button>
            <div class="mb-2">
                <label>Service Icon (FontAwesome)</label>
                <input type="text" name="services[${serviceCount}][icon]" class="form-control" placeholder="e.g., fa fa-flag-o">
            </div>
            <div class="mb-2">
                <label>Service Title</label>
                <input type="text" name="services[${serviceCount}][title]" class="form-control">
            </div>
            <div class="mb-2">
                <label>Service Description</label>
                <textarea name="services[${serviceCount}][description]" class="form-control" rows="3"></textarea>
            </div>
        `;
        container.appendChild(div);
        serviceCount++;
    });

    document.addEventListener('click', function(e){
        if(e.target.closest('.remove-service-btn')){
            e.target.closest('.service-item').remove();
        }
    });
</script>

@endsection