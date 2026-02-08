@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>{{ $sightseeing->name }}</h4>
                        <a href="{{ route('admin.sightseeing.index') }}" class="btn btn-primary">Back to List</a>
                    </div>
                    <div class="tab-inn">
                        <div class="row">
                            <div class="col-md-4">
                                @if($sightseeing->image)
                                    <img src="{{ asset('uploads/sightseeing/'.$sightseeing->image) }}" alt="{{ $sightseeing->name }}" class="img-fluid" style="max-width:100%; border:1px solid #ccc; padding:5px;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h5>Short Description</h5>
                                <p>{{ $sightseeing->short_description }}</p>

                                <h5>Long Description</h5>
                                <p>{{ $sightseeing->long_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
