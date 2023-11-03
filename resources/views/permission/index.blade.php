@extends('layouts.app')

@section('title', 'Home Permission')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Permission</h1>
    <a href="{{ url('permission/create') }}" class="btn btn-primary">Add New Permission</a>
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

        <th scope="col" width="20%">ID</th>
        <th scope="col" width="20%">Name</th>
        <th scope="col" width="1%">Guard</th>
    </thead>

    @foreach($permission as $item)
    <tr>

        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->guard_name }}</td>
        <!-- <td>
            <div class="btn-group">
                <a href="{{ url('permission/show', $item->id) }}" class="btn btn-dark btn-lg"><i class="fas fa-file"></i></a>
                <a href="{{ url('permission/edit', $item->id) }}" class="btn btn-warning btn-lg"><i class="fas fa-pen"></i></a>
                <a href="{{ url('permission/delete', $item->id) }}" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
            </div>
        </td> -->
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