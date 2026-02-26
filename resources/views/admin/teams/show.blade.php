@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre">
                <a href="#">Team Member Details</a>
            </li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">

                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>{{ $team->name }} - Details</h4>
                        <p>Complete team member information</p>

                        <a href="{{ route('admin.teams.edit', $team->id) }}"
                           class="btn btn-warning btn-sm"
                           style="margin-right: 10px;">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.teams.destroy', $team->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure?')"
                              style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>

                    <div class="tab-inn">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center; padding: 20px;">
                                @if($team->image && file_exists(public_path('uploads/teams/' . $team->image)))
                                    <img src="{{ asset('uploads/teams/' . $team->image) }}" 
                                         style="max-width: 250px; height: 250px; object-fit: cover; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                @else
                                    <div style="width: 250px; height: 250px; background-color: #e0e0e0; border-radius: 5px; display: flex; align-items: center; justify-content: center; color: #999; margin: 0 auto;">
                                        <i class="fa fa-user-circle" style="font-size: 80px;"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-8" style="padding: 20px;">
                                <div style="margin-bottom: 20px;">
                                    <h4 style="margin-bottom: 5px; color: #333;">Personal Information</h4>
                                    <hr style="margin: 10px 0; border-top: 1px solid #ddd;">
                                    
                                    <div style="margin: 10px 0;">
                                        <strong>Name:</strong> {{ $team->name }}
                                    </div>
                                    <div style="margin: 10px 0;">
                                        <strong>Email:</strong> 
                                        @if($team->email)
                                            <a href="mailto:{{ $team->email }}">{{ $team->email }}</a>
                                        @else
                                            <span style="color: #999;">Not provided</span>
                                        @endif
                                    </div>
                                    <div style="margin: 10px 0;">
                                        <strong>Location:</strong> {{ $team->location ?? 'Not provided' }}
                                    </div>
                                    <div style="margin: 10px 0;">
                                        <strong>WhatsApp:</strong> 
                                        @if($team->whatsapp_number)
                                            <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', $team->whatsapp_number) }}" target="_blank">
                                                {{ $team->whatsapp_number }}
                                            </a>
                                        @else
                                            <span style="color: #999;">Not provided</span>
                                        @endif
                                    </div>
                                </div>

                                <div style="margin-top: 30px;">
                                    <h4 style="margin-bottom: 5px; color: #333;">Social Media</h4>
                                    <hr style="margin: 10px 0; border-top: 1px solid #ddd;">
                                    
                                    <div style="margin: 10px 0;">
                                        @if($team->facebook)
                                            <a href="{{ $team->facebook }}" target="_blank" style="color: #17a2b8; margin-right: 15px;">
                                                <i class="fa fa-facebook-square" style="font-size: 24px;"></i>
                                            </a>
                                        @endif

                                        @if($team->instagram)
                                            <a href="{{ $team->instagram }}" target="_blank" style="color: #e4405f; margin-right: 15px;">
                                                <i class="fa fa-instagram" style="font-size: 24px;"></i>
                                            </a>
                                        @endif

                                        @if($team->twitter)
                                            <a href="{{ $team->twitter }}" target="_blank" style="color: #1da1f2; margin-right: 15px;">
                                                <i class="fa fa-twitter-square" style="font-size: 24px;"></i>
                                            </a>
                                        @endif

                                        @if($team->linkedin)
                                            <a href="{{ $team->linkedin }}" target="_blank" style="color: #0077b5; margin-right: 15px;">
                                                <i class="fa fa-linkedin-square" style="font-size: 24px;"></i>
                                            </a>
                                        @endif

                                        @if($team->youtube)
                                            <a href="{{ $team->youtube }}" target="_blank" style="color: #ff0000; margin-right: 15px;">
                                                <i class="fa fa-youtube-square" style="font-size: 24px;"></i>
                                            </a>
                                        @else
                                            <span style="color: #999;">No social media links added</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Created at:</strong> {{ $team->created_at->format('d M Y H:i') }}
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <strong>Updated at:</strong> {{ $team->updated_at->format('d M Y H:i') }}
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 20px;">
                            <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
