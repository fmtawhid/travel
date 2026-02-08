@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Add New SightSeeing</h4>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.sightseeing.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="name" value="{{ old('name') }}" required>
                        <label>Name</label>
                        @error('name') <span style="color:red;font-size:12px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field col s12">
                        <textarea name="short_description" class="materialize-textarea">{{ old('short_description') }}</textarea>
                        <label>Short Description</label>
                        @error('short_description') <span style="color:red;font-size:12px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field col s12">
                        <textarea name="long_description" class="materialize-textarea">{{ old('long_description') }}</textarea>
                        <label>Long Description</label>
                        @error('long_description') <span style="color:red;font-size:12px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="col s12">
                        <div class="file-field input-field">
                            <div class="btn blue">
                                <span>Image</span>
                                <input type="file" name="image" accept="image/*" id="featured-image">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload Image">
                            </div>
                        </div>
                        <div id="featured-preview" style="margin-top:10px;">
                            <img id="featured-img-tag" src="" style="max-width:200px; display:none; border:1px solid #ccc; padding:3px;">
                        </div>
                        @error('image') <span style="color:red;font-size:12px;">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row" style="margin-top:30px;">
                    <div class="input-field col s12">
                        <button class="waves-effect waves-light btn-large" style="background-color:#007bff;">Create SightSeeing</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('featured-image').addEventListener('change', function(e){
    const file = e.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            const imgTag = document.getElementById('featured-img-tag');
            imgTag.src = e.target.result;
            imgTag.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
