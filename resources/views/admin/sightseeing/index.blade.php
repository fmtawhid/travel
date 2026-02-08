@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>All SightSeeings</h4>
                        <a href="{{ route('admin.sightseeings.create') }}" class="btn btn-success">Add New SightSeeing</a>
                    </div>
                    <div class="tab-inn">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive table-desi">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Short Description</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sightseeings as $sight)
                                    <tr>
                                        <td>
                                            @if($sight->image)
                                                <img src="{{ asset('uploads/sightseeing/'.$sight->image) }}" width="50" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $sight->name }}</td>
                                        <td>{{ Str::limit($sight->short_description, 50) }}</td>
                                        <td>
                                            <a href="{{ route('admin.sightseeings.show', $sight) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.sightseeings.edit', $sight) }}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.sightseeings.destroy', $sight) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background:none;border:none;color:red;">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No SightSeeings found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $sightseeings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
