@extends('layouts.admin')

@section('content')
<div class="sb2-2">

    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li>
                <a href="{{ route('admin.packages.index') }}">Packages</a>
            </li>
            <li class="active-bre">Edit Package</li>
        </ul>
    </div>

    <div class="sb2-2-add-blog sb2-2-1">
        <h4>Edit Package</h4>

        <form action="{{ route('admin.packages.update', $package->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Package Name --}}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text"
                           name="name"
                           value="{{ old('name', $package->name) }}"
                           required>
                    <label class="active">Package Name</label>
                </div>
            </div>

            {{-- Image Upload --}}
            <div class="row">
                <div class="col s12">
                    <div class="file-field input-field">
                        <div class="btn blue">
                            <span>Image</span>
                            <input type="file" name="image" accept="image/*">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                    {{-- Old Image Preview --}}
                    @if($package->image)
                        <div style="margin-top:15px;">
                            <p>Current Image:</p>
                            <img src="{{ asset('uploads/packages/'.$package->image) }}"
                                 width="120"
                                 style="border-radius:5px;">
                        </div>
                    @endif
                </div>
            </div>

            {{-- Submit --}}
            <div class="row">
                <div class="col s12">
                    <button type="submit"
                            class="waves-effect waves-light btn-large blue">
                        Update Package
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
