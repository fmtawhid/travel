@extends('layouts.admin')

@section('content')
<div class="sb2-2">
        <div class="sb2-2-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-inn-sp">
                        <div class="inn-title">
                            <h4>All Tours</h4>
                            <a href="{{ route('admin.tours.create') }}" class="btn btn-success">Add New Tour</a>
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
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Dates</th>
                                            <th>Includes</th>
                                            <th>Rating</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($tours as $tour)
                                        <tr>
                                            <td>
                                                @if($tour->image)
                                                    <img src="{{ asset('uploads/tours/'.$tour->image) }}" width="50" alt="">
                                                @endif
                                            </td>
                                            <td>{{ $tour->title }}</td>
                                            <td>{{ $tour->location }}</td>
                                            <td>${{ $tour->price }}</td>
                                            <td>{{ $tour->duration }}</td>
                                            <td>
                                                @if($tour->start_date && $tour->end_date)
                                                    {{ \Carbon\Carbon::parse($tour->start_date)->format('M d') }} - {{ \Carbon\Carbon::parse($tour->end_date)->format('M d') }}
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td>
                                                <small>
                                                    @if($tour->include_sightseeing) <span style="background: #28a745; color: white; padding: 2px 5px; border-radius: 3px;">Sight</span> @endif
                                                    @if($tour->include_hotel) <span style="background: #17a2b8; color: white; padding: 2px 5px; border-radius: 3px;">Hotel</span> @endif
                                                    @if($tour->include_transfer) <span style="background: #ffc107; color: black; padding: 2px 5px; border-radius: 3px;">Trans</span> @endif
                                                    @if($tour->include_luggage) <span style="background: #6c757d; color: white; padding: 2px 5px; border-radius: 3px;">Luggage</span> @endif
                                                </small>
                                            </td>
                                            <td>{{ $tour->rating ?? '0' }}</td>
                                            {{-- VIEW --}}
                                            <td>
                                                <a href="{{ route('admin.tours.show', $tour) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>

                                            {{-- EDIT --}}
                                            <td>
                                                <a href="{{ route('admin.tours.edit', $tour) }}">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                            </td>

                                            {{-- DELETE --}}
                                            <td>
                                                <form action="{{ route('admin.tours.destroy', $tour) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                                            <td colspan="10" class="text-center">No tours found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $tours->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
