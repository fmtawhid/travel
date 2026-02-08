@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Breadcrumb --}}
    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home" aria-hidden="true"></i> Home
                </a>
            </li>
            <li class="active-bre">
                <a href="#">Packages</a>
            </li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">

                    {{-- Title --}}
                    <div class="inn-title">
                        <h4>All Packages</h4>
                        <a href="{{ route('admin.packages.create') }}" class="btn btn-sm btn-primary pull-right">
                            + Add Package
                        </a>
                    </div>

                    {{-- Table --}}
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Name</th>
                                        <th>Created At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @forelse($packages as $package)
                                    <tr>
                                        <td>{{ $package->id }}</td>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ $package->created_at->format('d M Y') }}</td>

                                        {{-- EDIT --}}
                                        <td>
                                            <a href="{{ route('admin.packages.edit', $package) }}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>

                                        {{-- DELETE --}}
                                        <td>
                                            <form action="{{ route('admin.packages.destroy', $package) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Delete this package?')">
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
                                        <td colspan="5" class="text-center">No packages found</td>
                                    </tr>
                                @endforelse
                                </tbody>

                            </table>

                            {{-- Pagination --}}
                            <div class="mt-3">
                                {{ $packages->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
