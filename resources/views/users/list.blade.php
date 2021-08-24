@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row">
        <div class="col-2 px-3">
            <div class="card card-header">Users List</div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Users List
                </div>
                <div class="card-body">
                    <hr class="w-100 mb-3">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge badge-dark p-2">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="#">Edit</a></td>
                        </tr>
                        @empty
                            <p>No User Registered!</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
