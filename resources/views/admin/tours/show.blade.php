@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Tour Details</h4>
                        <a href="{{ route('admin.tours.index') }}" class="btn btn-sm btn-primary pull-right">Back to List</a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="tab-inn">
                        <div class="row">
                            <div class="col-md-6">
                                @if($tour->image)
                                    <img src="{{ asset('uploads/tours/'.$tour->image) }}" alt="" style="width:100%; border:1px solid #ddd; padding:6px;">
                                @endif

                                @if($galleries->count())
                                    <div style="display:flex; gap:8px; margin-top:10px; flex-wrap:wrap;">
                                        @foreach($galleries as $g)
                                            <img src="{{ asset('uploads/tours/gallery/'.$g->image) }}" width="80" style="border:1px solid #ccc; padding:3px;" alt="">
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <h3>{{ $tour->title }}</h3>
                                <p><strong>Location:</strong> {{ $tour->location ?? '—' }}</p>
                                <p><strong>Price:</strong> ${{ $tour->price ?? '—' }}</p>
                                <p><strong>Duration:</strong> {{ $tour->duration ?? '—' }}</p>
                                <p><strong>Dates:</strong>
                                    @if($tour->start_date && $tour->end_date)
                                        {{ \Carbon\Carbon::parse($tour->start_date)->format('M d, Y') }} — {{ \Carbon\Carbon::parse($tour->end_date)->format('M d, Y') }}
                                    @else
                                        —
                                    @endif
                                </p>

                                <p><strong>Includes:</strong>
                                    @if($tour->include_sightseeing) <span class="label label-success">Sightseeing</span> @endif
                                    @if($tour->include_hotel) <span class="label label-info">Hotel</span> @endif
                                    @if($tour->include_transfer) <span class="label label-warning">Transfer</span> @endif
                                    @if($tour->include_luggage) <span class="label label-default">Luggage</span> @endif
                                </p>

                                <p><strong>Rating:</strong> {{ $tour->rating ?? '0' }}</p>

                                <div style="margin-top:15px;">
                                    <a href="{{ route('admin.tours.edit', $tour) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.tours.destroy', $tour) }}" method="POST" style="display:inline-block; margin-left:8px;" onsubmit="return confirm('Delete this tour?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5>Short Description</h5>
                        <p>{!! nl2br(e($tour->short_description)) !!}</p>

                        <h5>Long Description</h5>
                        <p>{!! nl2br(e($tour->long_description)) !!}</p>

                        <h5>Itineraries</h5>
                        @if($itineraries->count())
                            <table class="table table-bordered">
                                <thead>
                                    <tr><th>Day</th><th>Title</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    @foreach($itineraries as $it)
                                        <tr>
                                            <td>{{ $it->day_number }}</td>
                                            <td>{{ $it->title }}</td>
                                            <td>{{ $it->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No itineraries added.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
