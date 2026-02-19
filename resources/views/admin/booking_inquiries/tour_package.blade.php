@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active-bre"><a href="#">Tour Package Inquiries</a></li>
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
                        <h4>All Tour Package Inquiries</h4>
                    </div>

                    <div class="tab-inn">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Package</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Arrival</th>
                                        <th>Departure</th>
                                        <th>Adults</th>
                                        <th>Childrens</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($inquiries as $inquiry)
                                        <tr>
                                            <td>{{ $loop->iteration + ($inquiries->currentPage()-1)*$inquiries->perPage() }}</td>
                                            <td>{{ $inquiry->user?->name ?? 'Guest' }}</td>
                                            <td>{{ $inquiry->package?->name ?? '-' }}</td>
                                            <td>{{ $inquiry->name }}</td>
                                            <td>{{ $inquiry->phone }}</td>
                                            <td>{{ $inquiry->email }}</td>
                                            <td>{{ $inquiry->city }}</td>
                                            <td>{{ $inquiry->arrival?->format('d M, Y') }}</td>
                                            <td>{{ $inquiry->departure?->format('d M, Y') }}</td>
                                            <td>{{ $inquiry->noofadults }}</td>
                                            <td>{{ $inquiry->noofchildrens }}</td>
                                            <td>
                                                <form action="{{ route('admin.booking-inquiries.tour-package.destroy', $inquiry->id) }}"
                                                      method="POST"
                                                      style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this inquiry?')"
                                                            style="border:none;background:none;color:red;">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center">
                                                No inquiries found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{-- Pagination --}}
                            {{ $inquiries->links() }}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
