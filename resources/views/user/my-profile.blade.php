@extends('layouts.user')
@section('user_dashboard')

<div class="db-2">
    <div class="db-2-com db-2-main">
        <h4>My Profile</h4>
        <div class="db-2-main-com db-2-main-com-table">

            <table class="responsive-table">
                <tbody>

                    <tr>
                        <td>Profile Image</td>
                        <td>:</td>
                        <td>
                            @if($user->image)
                                <img src="{{ asset('uploads/users/'.$user->image) }}"
                                     width="120"
                                     style="border-radius:8px;">
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>User Name</td>
                        <td>:</td>
                        <td>{{ $user->name }}</td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>{{ $user->phone ?? 'N/A' }}</td>
                    </tr>

                    <tr>
                        <td>City</td>
                        <td>:</td>
                        <td>{{ $user->city ?? 'N/A' }}</td>
                    </tr>

                    <tr>
                        <td>Country</td>
                        <td>:</td>
                        <td>{{ $user->country ?? 'N/A' }}</td>
                    </tr>

                    <tr>
                        <td>Date of Birth</td>
                        <td>:</td>
                        <td>{{ $user->date_of_birth ?? 'N/A' }}</td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <span class="db-done">
                                {{ ucfirst($user->status) }}
                            </span>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="db-mak-pay-bot">
                <a href="{{ route('user.profile.edit') }}"
                   class="waves-effect waves-light btn-large">
                    Edit my profile
                </a>
            </div>

        </div>
    </div>
</div>

@endsection
