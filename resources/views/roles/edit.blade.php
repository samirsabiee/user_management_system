@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row">
        <div class="col-2 px-3">
            @include('partials.panel-menu')
        </div>
        <div class="col">
            <div class="card mb-3">
                <div class="card-header">
                    Edit Role
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('roles.update', $role->id) }}">
                        @csrf
                        <div class="d-flex flex-row justify-content-around align-items-center">
                            <div class="col-4 form-group">
                                <input type="text" class="form-control" name="name" placeholder="role name"
                                       aria-label="role_name" value="{{ $role->name }}">
                            </div>
                            <div class="col-4 form-group">
                                <input type="text" class="form-control" name="persian_name"
                                       placeholder="role persian name"
                                       value="{{ $role->persian_name }}"
                                       aria-label="role_name">
                            </div>
                        </div>
                        <h6 class="mt-3">Assign Permission To Role</h6>
                        <hr>
                        <div class="d-flex flex-row">
                            @forelse($permissions as $permission)
                                <div class="custom-control custom-checkbox mx-3">
                                    <input class="custom-control-input"
                                           {{ $role->permissions->contains($permission)? 'checked':'' }} type="checkbox"
                                           name="permissions[]"
                                           value="{{ $permission->name }}" id="permission-{{$permission->id}}">
                                    <label class="custom-control-label"
                                           for="permission-{{ $permission->id }}"> {{$permission->name}} </label>
                                </div>
                            @empty
                                <p>No Role Exist!</p>
                            @endforelse
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
