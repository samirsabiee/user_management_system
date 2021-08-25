@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row">
        <div class="col-2 px-3">
            @include('partials.panel-menu')
        </div>
        <div class="col">
            <div class="card mb-3">
                <div class="card-header">
                    Add Role
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('roles.store') }}"
                          class="d-flex flex-row justify-content-around align-items-center">
                        @csrf
                        <div class="col-4 form-group">
                            <input type="text" class="form-control" name="name" placeholder="role name"
                                   aria-label="role_name">
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" class="form-control" name="persian_name"
                                   placeholder="role persian name"
                                   aria-label="role_name">
                        </div>
                        <div class="col-2 form-group">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Roles List
                </div>
                <div class="card-body">
                    <hr class="w-100 mb-3">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Persian Name</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->persian_name }}</td>
                                <td><a href="{{ route('roles.edit', $role->id) }}">Edit</a></td>
                            </tr>
                        @empty
                            <p>No Role Registered!</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
