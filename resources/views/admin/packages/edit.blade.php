@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    {{-- Breadcrumb --}}
    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home" aria-hidden="true"></i> Home
                </a>
            </li>
            <li class="active-bre">
                <a href="{{ route('admin.packages.index') }}">Packages</a>
            </li>
            <li class="active-bre">Edit Package</li>
        </ul>
    </div>

    <div class="sb2-2-add-blog sb2-2-1">
        <h4>Edit Package</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-field col s12">
                <input type="text" name="name" value="{{ old('name', $package->name) }}" required>
                <label>Package Name</label>
                @error('name')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="waves-effect waves-light btn-large" style="background-color: #007bff;">
                        Update Package
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
