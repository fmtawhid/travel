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
                    <a href="#">Edit Team Member</a>
                </li>
            </ul>
        </div>

        <div class="sb2-2-add-blog sb2-2-1">
            <h2>Edit Team Member Details</h2>

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

            <form action="{{ route('admin.teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <ul class="nav nav-tabs tab-list">
                    <li class="active">
                        <a data-toggle="tab" href="#home"><i class="fa fa-info" aria-hidden="true"></i>
                            <span>Detail</span></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu1"><i class="fa fa-facebook" aria-hidden="true"></i> <span>Social
                                Media</span></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu2"><i class="fa fa-phone" aria-hidden="true"></i> <span>Contact
                                Info</span></a>
                    </li>
                </ul>

                <div class="tab-content">

                    {{-- DETAILS TAB --}}
                    <div id="home" class="tab-pane fade in active">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Team Member Information</h4>
                            </div>
                            <div class="bor">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="name" type="text" class="validate" value="{{ old('name', $team->name) }}" required>
                                        <label>Member Name</label>
                                        @error('name')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="location" type="text" class="validate" value="{{ old('location', $team->location) }}">
                                        <label>Location</label>
                                        @error('location')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s6">
                                        <input name="email" type="email" class="validate" value="{{ old('email', $team->email) }}">
                                        <label>Email</label>
                                        @error('email')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                {{-- Team Member Image --}}
                                <div class="row">
                                    <div class="input-field col s12">
                                        <h5
                                            style="margin: 20px 0 10px 0; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                                            Team Member Image</h5>
                                        <div class="file-field input-field">
                                            <div class="btn blue">
                                                <span>Upload Image</span>
                                                <input type="file" name="image" accept="image/*" id="team-image">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text"
                                                    placeholder="Upload Team Member Image">
                                            </div>
                                        </div>
                                        @error('image')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror

                                        <div id="image-preview" style="margin-top: 10px;">
                                            @if($team->image && file_exists(public_path('uploads/teams/' . $team->image)))
                                                <img id="team-img-tag" src="{{ asset('uploads/teams/' . $team->image) }}"
                                                    style="max-width: 200px; border: 1px solid #ccc; padding: 3px; border-radius: 3px;">
                                            @else
                                                <img id="team-img-tag" src=""
                                                    style="max-width: 200px; display: none; border: 1px solid #ccc; padding: 3px; border-radius: 3px;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SOCIAL MEDIA TAB --}}
                    <div id="menu1" class="tab-pane fade">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Social Media Links</h4>
                            </div>
                            <div class="bor">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="facebook" type="url" class="validate" value="{{ old('facebook', $team->facebook) }}" 
                                            placeholder="https://facebook.com/...">
                                        <label>Facebook URL</label>
                                        @error('facebook')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="instagram" type="url" class="validate" value="{{ old('instagram', $team->instagram) }}"
                                            placeholder="https://instagram.com/...">
                                        <label>Instagram URL</label>
                                        @error('instagram')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="twitter" type="url" class="validate" value="{{ old('twitter', $team->twitter) }}"
                                            placeholder="https://twitter.com/...">
                                        <label>Twitter URL</label>
                                        @error('twitter')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="linkedin" type="url" class="validate" value="{{ old('linkedin', $team->linkedin) }}"
                                            placeholder="https://linkedin.com/...">
                                        <label>LinkedIn URL</label>
                                        @error('linkedin')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-field col s12">
                                        <input name="youtube" type="url" class="validate" value="{{ old('youtube', $team->youtube) }}"
                                            placeholder="https://youtube.com/...">
                                        <label>YouTube URL</label>
                                        @error('youtube')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- CONTACT INFO TAB --}}
                    <div id="menu2" class="tab-pane fade">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Contact Information</h4>
                            </div>
                            <div class="bor">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="whatsapp_number" type="text" class="validate" value="{{ old('whatsapp_number', $team->whatsapp_number) }}"
                                            placeholder="+1 (555) 000-0000">
                                        <label>WhatsApp Number</label>
                                        @error('whatsapp_number')
                                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Form Actions --}}
                <div class="box-inn-sp" style="margin-top: 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" style="margin-right: 10px;">
                                <i class="fa fa-save"></i> Update Team Member
                            </button>
                            <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        // Image preview
        document.getElementById('team-image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const img = document.getElementById('team-img-tag');
                    img.src = event.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
