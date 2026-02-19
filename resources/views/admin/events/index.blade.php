@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active-bre"><a href="#">Events</a></li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>All Events</h4>
                        <a href="{{ route('admin.events.create') }}"
                           class="btn btn-success btn-sm"
                           style="float:right;">
                           + Add Event
                        </a>
                    </div>

                    <div class="tab-inn">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Location</th>
                                        <th style="text-align:center;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($events as $event)
                                        <tr>
                                            <td>
                                                @if($event->image && file_exists(public_path('uploads/events/'.$event->image)))
                                                    <img src="{{ asset('uploads/events/'.$event->image) }}"
                                                         style="width:50px;height:50px;object-fit:cover;border-radius:4px;">
                                                @else
                                                    <div style="width:50px;height:50px;background:#eee;
                                                        display:flex;align-items:center;justify-content:center;
                                                        border-radius:4px;color:#999;">
                                                        <i class="fa fa-image"></i>
                                                    </div>
                                                @endif
                                            </td>

                                            <td>{{ $event->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}</td>
                                            <td>{{ $event->location ?? '-' }}</td>

                                            <td style="text-align:center;">
                                                <a href="{{ route('admin.events.edit',$event->id) }}"
                                                   style="color:#ffc107;margin-right:10px;">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <form action="{{ route('admin.events.destroy',$event->id) }}"
                                                      method="POST"
                                                      style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure?')"
                                                        style="border:none;background:none;color:#dc3545;">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                No events found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $events->links() }}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
