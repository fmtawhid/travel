@extends('layouts.admin')

@section('content')

<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Edit Blog</h4>
            </div>

            <form action="{{ route('admin.blogs.update',$blog->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="input-field col s12">
                        <input name="title" type="text"
                               value="{{ old('title',$blog->title) }}" required>
                        <label class="active">Blog Title</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="author" type="text"
                               value="{{ old('author',$blog->author) }}">
                        <label class="active">Author</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="city" type="text"
                               value="{{ old('city',$blog->city) }}">
                        <label class="active">City</label>
                    </div>

                    <div class="input-field col s12">
                        <textarea name="description"
                                  class="materialize-textarea">{{ old('description',$blog->description) }}</textarea>
                        <label class="active">Description</label>
                    </div>
                </div>

                {{-- Existing Image --}}
                @if($blog->image)
                    <div style="margin-bottom:15px;">
                        <img src="{{ asset('uploads/blogs/'.$blog->image) }}"
                             style="width:120px;height:auto;">
                    </div>
                @endif

                {{-- New Image --}}
                <div class="file-field input-field">
                    <div class="btn blue">
                        <span>Change Image</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <button class="waves-effect waves-light btn-large"
                        style="background-color:#28a745;">
                    Update Blog
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
