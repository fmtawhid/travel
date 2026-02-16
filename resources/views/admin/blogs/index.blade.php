@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active-bre"><a href="#">Blogs</a></li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>All Blogs</h4>
                        <a href="{{ route('admin.blogs.create') }}"
                           class="btn btn-success btn-sm"
                           style="float:right;">
                           + Add Blog
                        </a>
                    </div>

                    <div class="tab-inn">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>City</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blogs as $blog)
                                        <tr>
                                            <td>
                                                @if($blog->image && file_exists(public_path('uploads/blogs/'.$blog->image)))
                                                    <img src="{{ asset('uploads/blogs/'.$blog->image) }}"
                                                         style="width:50px;height:50px;object-fit:cover;">
                                                @endif
                                            </td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->author ?? '-' }}</td>
                                            <td>{{ $blog->city ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('admin.blogs.edit',$blog->id) }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <form action="{{ route('admin.blogs.destroy',$blog->id) }}"
                                                      method="POST"
                                                      style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure?')"
                                                        style="border:none;background:none;color:red;">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                No blogs found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $blogs->links() }}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
