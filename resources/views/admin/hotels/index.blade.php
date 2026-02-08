@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre">
                <a href="#">Hotels</a>
            </li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fa fa-check-circle"></i> Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>All Hotels</h4>
                        <p>Manage all hotel listings</p>

                        <a href="{{ route('admin.hotels.create') }}"
                           class="btn btn-success btn-sm"
                           style="float:right;">
                            + Add Hotel
                        </a>
                    </div>

                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Hotel Name</th>
                                        <th>Location</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th style="text-align: center;">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($hotels as $hotel)
                                        <tr>
                                            <td>
                                                @if($hotel->image && file_exists(public_path('uploads/hotels/' . $hotel->image)))
                                                    <img src="{{ asset('uploads/hotels/' . $hotel->image) }}" 
                                                         style="max-width: 50px; height: 50px; object-fit: cover; border-radius: 3px;">
                                                @else
                                                    <div style="width: 50px; height: 50px; background-color: #e0e0e0; border-radius: 3px; display: flex; align-items: center; justify-content: center; color: #999;">
                                                        <i class="fa fa-image"></i>
                                                    </div>
                                                @endif
                                            </td>

                                            <td>
                                                <span class="list-enq-name">
                                                    {{ $hotel->name }}
                                                </span>
                                            </td>

                                            <td>{{ $hotel->location ?? '-' }}</td>
                                            <td>{{ $hotel->phone ?? '-' }}</td>
                                            <td>{{ $hotel->email ?? '-' }}</td>

                                            <td style="text-align: center;">
                                                <a href="{{ route('admin.hotels.show', $hotel->id) }}" 
                                                   style="color: #17a2b8; margin: 0 5px;">
                                                    <i class="fa fa-eye" aria-hidden="true" style="font-size: 16px;"></i>
                                                </a>
                                                <a href="{{ route('admin.hotels.edit', $hotel->id) }}"
                                                   style="color: #ffc107; margin: 0 5px;">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 16px;"></i>
                                                </a>
                                                <form action="{{ route('admin.hotels.destroy', $hotel->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Are you sure?')"
                                                      style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            style="border:none;background:none;color:#dc3545;margin: 0 5px;cursor:pointer;font-size:16px;">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                No hotels found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $hotels->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
