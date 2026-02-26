@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre">
                <a href="#">Team Members</a>
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
                        <h4>All Team Members</h4>
                        <p>Manage all team member information</p>

                        <a href="{{ route('admin.teams.create') }}"
                           class="btn btn-success btn-sm"
                           style="float:right;">
                            + Add Team Member
                        </a>
                    </div>

                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Phone</th>
                                        <th style="text-align: center;">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($teams as $team)
                                        <tr>
                                            <td>
                                                @if($team->image && file_exists(public_path('uploads/teams/' . $team->image)))
                                                    <img src="{{ asset('uploads/teams/' . $team->image) }}" 
                                                         style="max-width: 50px; height: 50px; object-fit: cover; border-radius: 3px;">
                                                @else
                                                    <div style="width: 50px; height: 50px; background-color: #e0e0e0; border-radius: 3px; display: flex; align-items: center; justify-content: center; color: #999;">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                @endif
                                            </td>

                                            <td>
                                                <span class="list-enq-name">
                                                    {{ $team->name }}
                                                </span>
                                            </td>

                                            <td>{{ $team->email ?? '-' }}</td>
                                            <td>{{ $team->location ?? '-' }}</td>
                                            <td>{{ $team->whatsapp_number ?? '-' }}</td>

                                            <td style="text-align: center;">
                                                <a href="{{ route('admin.teams.show', $team->id) }}" 
                                                   style="color: #17a2b8; margin: 0 5px;">
                                                    <i class="fa fa-eye" aria-hidden="true" style="font-size: 16px;"></i>
                                                </a>
                                                <a href="{{ route('admin.teams.edit', $team->id) }}"
                                                   style="color: #ffc107; margin: 0 5px;">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 16px;"></i>
                                                </a>
                                                <form action="{{ route('admin.teams.destroy', $team->id) }}"
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
                                            <td colspan="6" class="text-center" style="padding: 30px;">
                                                <p style="color: #999;">No team members found</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $teams->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
