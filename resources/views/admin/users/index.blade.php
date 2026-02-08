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
                <a href="#">Users</a>
            </li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">

                    {{-- Title --}}
                    <div class="inn-title">
                        <h4>All Users</h4>
                        <a href="{{ route('admin.users.create') }}"
                           class="btn btn-sm btn-primary pull-right">
                            + Add User
                        </a>
                    </div>

                    {{-- Table --}}
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Role</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>

                                        {{-- Avatar --}}
                                        <td>
                                            <span class="list-img">
                                                <img src="{{ asset('images/user/placeholder.png') }}" alt="">
                                            </span>
                                        </td>

                                        {{-- Name --}}
                                        <td>
                                            <span class="list-enq-name">
                                                {{ $user->first_name }} {{ $user->last_name }}
                                            </span>
                                            <span class="list-enq-city">
                                                {{ $user->city ?? '—' }},
                                                {{ $user->country ?? '—' }}
                                            </span>
                                        </td>

                                        <td>{{ $user->phone ?? '—' }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->country ?? '—' }}</td>

                                        <td>
                                            <span class="label label-info">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>

                                        {{-- VIEW --}}
                                        <td>
                                            <a href="{{ route('admin.users.show', $user) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>

                                        {{-- EDIT --}}
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user) }}">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>

                                        {{-- DELETE --}}
                                        <td>
                                            <form action="{{ route('admin.users.destroy', $user) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Delete this user?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        style="background:none;border:none;color:red;">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            No users found
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
