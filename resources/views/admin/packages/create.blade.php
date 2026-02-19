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
            <li><a href="{{ route('admin.packages.index') }}">Packages</a></li>
            <li class="active-bre">Add Package</li>
        </ul>
    </div>

    <div class="sb2-2-add-blog sb2-2-1">
        <h4>Add Package</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0;padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.packages.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            {{-- Package Name --}}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required>
                    <label>Package Name</label>
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
                </div>
            </div>

            {{-- Submit --}}
            <div class="row">
                <div class="col s12">
                    <button type="submit"
                            class="waves-effect waves-light btn-large blue">
                        Save Package
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
