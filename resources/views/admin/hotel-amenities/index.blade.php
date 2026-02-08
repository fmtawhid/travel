@extends('layouts.admin')

@section('content')
<div class="sb2-2">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="sb2-2-3">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Hotel Amenities</h4>
                <a href="{{ route('admin.hotel-amenities.create') }}"
                   class="btn btn-sm btn-primary pull-right">
                    + Add Amenity
                </a>
            </div>

            <div class="tab-inn">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Amenity Name</th>
                            <th>Created</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($amenities as $amenity)
                        <tr>
                            <td>{{ $amenity->id }}</td>
                            <td>{{ $amenity->name }}</td>
                            <td>{{ $amenity->created_at->format('d M Y') }}</td>

                            <td>
                                <a href="{{ route('admin.hotel-amenities.edit', $amenity) }}">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                            </td>

                            <td>
                                <form action="{{ route('admin.hotel-amenities.destroy', $amenity) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this amenity?')">
                                    @csrf
                                    @method('DELETE')
                                    <button style="background:none;border:none;color:red">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No amenities found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                {{ $amenities->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
