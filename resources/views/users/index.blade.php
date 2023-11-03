@extends('layouts.app')

@section('contents')

<div id="statusMessage" class="alert" style="display: none;"></div>

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }


    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>


<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Users</h1>
    <a href="{{ url('users/create') }}" class="btn btn-info">Add New User</a>
</div>
<hr />

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

<table class="table table-hover display nowrap text-center" id="example" style="width:100%">
    <thead class="table-primary">
        <tr>
            <th class="text-center" scope="col">ID</th>
            <th class="text-center" scope="col">Name</th>
            {{-- <th class="text-center" scope="col">User Name</th> --}}
            <th class="text-center" scope="col">User Email</th>
            <th class="text-center" scope="col">User Role</th>
            <th class="text-center" scope="col">User Status</th>
            <th class="text-center" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($user->count() > 0)
        @foreach($user as $item)
        <tr>
            <td>{{ $item->id ?? '' }}</td>
            <td>{{ $item->name ?? '' }}</td>
            {{-- <td>{{ $item->username ?? '' }}</td> --}}
            <td>{{ $item->email ?? '' }}</td>
            <td>{{ $item->roles[0]->name ?? '' }}</td>

            <td>
                <label class="switch">
                    <input type="checkbox" class="status-toggle" data-user-id="{{ $item->id }}" @if($item->status == 1) checked @endif>
                    <span class="slider round"></span>
                </label>
            </td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ url('users/show', $item->id) }}" class="btn btn-secondary">Detail</a>
                    <a href="{{ url('users/edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ url('users/destroy', $item->id) }}" method="POST" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-0">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5">Users not found</td>
        </tr>
        @endif
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $(document).on('change', '.status-toggle', function() {
            var userId = $(this).data('user-id');
            var status = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: '{{ route("users.updateStatus") }}',
                method: 'POST',

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    userId: userId,
                    status: status
                },
                success: function(response) {
                    console.log(response);
                    $('#statusMessage').removeClass('alert-danger').addClass('alert-success').text(response.message).show().delay(2000).fadeOut();

                    console.log('User status updated successfully');
                },
                error: function(error) {
                    $('#statusMessage').removeClass('alert-success').addClass('alert-danger').text('Error updating user status').show().delay(2000).fadeOut();
                    console.error('Error updating user status');
                }
            });
        });
    });
</script>

@endsection