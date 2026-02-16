@extends('layouts.admin')

@section('content')

<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Add New Blog</h4>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.blogs.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="input-field col s12">
                        <input name="title" type="text"
                               value="{{ old('title') }}" required>
                        <label>Blog Title</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="author" type="text"
                               value="{{ old('author') }}">
                        <label>Author</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="city" type="text"
                               value="{{ old('city') }}">
                        <label>City</label>
                    </div>

                    <div class="input-field col s12">
                        <textarea name="description"
                                  class="materialize-textarea">{{ old('description') }}</textarea>
                        <label>Description</label>
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

                <div class="row">
                    <div class="input-field col s12">
                        <button class="waves-effect waves-light btn-large"
                                style="background-color:#007bff;">
                            Create Blog
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
