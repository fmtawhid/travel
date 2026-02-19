@extends('layouts.admin')

@section('content')
<div class="sb2-2">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="active-bre">Packages</li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <div class="box-inn-sp">

            <div class="inn-title">
                <h4>All Packages</h4>
                <a href="{{ route('admin.packages.create') }}"
                   class="btn btn-sm blue pull-right">
                    + Add Package
                </a>
            </div>

            <div class="tab-inn">
                <div class="table-responsive">
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse($packages as $package)
                            <tr>
                                <td>{{ $package->id }}</td>

                                <td>
                                    @if($package->image)
                                        <img src="{{ asset('uploads/packages/'.$package->image) }}"
                                             width="70"
                                             style="border-radius:5px;">
                                    @else
                                        No Image
                                    @endif
                                </td>

                                <td>{{ $package->name }}</td>
                                <td>{{ $package->created_at->format('d M Y') }}</td>

                                <td>
                                    <a href="{{ route('admin.packages.edit', $package) }}">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>

                                <td>
                                    <form action="{{ route('admin.packages.destroy', $package) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this package?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                style="border:none;background:none;color:red;">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    No packages found
                                </td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>

                    {{ $packages->links() }}

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
