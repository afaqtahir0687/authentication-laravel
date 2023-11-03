@extends('layouts.app')

@section('title', 'Home Role')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Role</h1>
    <a href="{{ url('role/create') }}" class="btn btn-primary">Add New Role</a>
</div>
<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<label for="permissions" class="form-label">Assign Permissions</label>

<table class="table table-striped">
    <thead>
        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
        <th scope="col" width="20%">Name</th>
        <th scope="col" width="1%">Guard</th>
        <th scope="col" width="1%">Action</th>
    </thead>

    @foreach($role as $permission)
    <tr>
        <td>
            <input type="checkbox" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='permission'>
        </td>
        <td>{{ $permission->name }}</td>
        <td>{{ $permission->guard_name }}</td>
        <td>
            <a href="{{ route('role.edit',$permission->id) }}" class="btn btn-info">Edit Permissions</a>
        </td>
    </tr>
    @endforeach
</table>
<script type="text/javascript">
    $(document).ready(function() {
        $('[name="all_permission"]').on('click', function() {

            if ($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked', true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked', false);
                });
            }

        });
    });
</script>

@endsection