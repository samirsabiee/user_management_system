@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('users.update', $user->id) }}">
        @csrf
        <div class="d-flex flex-row">
            <div class="col-2 px-3">
                @include('partials.panel-menu')
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Users List Edit User {{ $user->name }}
                    </div>
                    <div class="card-body">
                        <h6>Assign Role To User</h6>
                        <hr class="w-100 mb-3">
                        <div class="d-flex flex-row">
                            @forelse($roles as $role)
                                <div class="custom-control custom-checkbox mx-3">
                                    <input class="custom-control-input"
                                           {{ $user->roles->contains($role)? 'checked':'' }} type="checkbox"
                                           name="roles[]"
                                           value="{{ $role->name }}" id="role-{{$role->id}}">
                                    <label class="custom-control-label"
                                           for="role-{{ $role->id }}"> {{$role->name}} </label>
                                </div>
                            @empty
                                <p>No Role Exist!</p>
                            @endforelse
                        </div>
                        <h6 class="mt-5">Assign Permission To User</h6>
                        <hr class="w-100 mb-3">
                        <div class="d-flex flex-row mb-3">
                            @forelse($permissions as $permission)
                                <div class="custom-control custom-checkbox mx-3">
                                    <input class="custom-control-input"
                                           {{ $user->permissions->contains($permission)? 'checked':'' }} type="checkbox"
                                           name="permissions[]"
                                           value="{{ $permission->name }}" id="permission-{{$permission->id}}">
                                    <label class="custom-control-label"
                                           for="permission-{{ $permission->id }}"> {{$permission->name}} </label>
                                </div>
                            @empty
                                <p>No Role Exist!</p>
                            @endforelse
                        </div>
                    </div>
                    <button class="col-2 btn btn-primary m-2" type="submit"> Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection
