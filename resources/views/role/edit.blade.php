@extends('layouts.app')

@section('contents')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Edit Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('role/index') }}"> Back </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
           @foreach($rolePermissions as $permission)
            <span class="badge badge-success">{{ $permission->name }}</span>
            @endforeach

           {{-- @else
            <span class="badge badge-secondary">No permissions assigned</span>
            @endif--}}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('[name="all_permission"]').on('click', function() {

            if ($(this).is(':checked')) {
                $('.permission').prop('checked', true);
            } else {
                $('.permission').prop('checked', false);
            }
        });
    });
</script>
@endsection