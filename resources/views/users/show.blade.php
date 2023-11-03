@extends('layouts.app')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Show User</h1>
    <a href="{{ url('users/index') }}" class="btn btn-secondary">Back to User List</a>
</div>
<hr />

@if($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ url('users/update', $roles->id) }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required value="{{ ($roles->name ?? '')}}" readonly>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required value="{{ ($roles->email ?? '')}}" readonly>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required value="{{($roles->password ?? '')}}" readonly>
    </div>

   {{-- <div class="form-group">
        <label for="">Select Role</label>
        <select name="role_id" class="form-control" value="{{ ($user->role ?? '')}}" readonly>
            <option value="">Select Role</option>
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>--}}
    <button type="submit" class="btn btn-primary">Save User</button>
</form>
@endsection
