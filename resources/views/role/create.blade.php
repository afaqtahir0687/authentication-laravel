@extends('layouts.app')

@section('contents')
<div class="bg-light p-4 rounded">
    <div class="card">
        <div class="card-header">
            <h1>Add new role</h1>
        </div>
        <div class="card-body">
            <div class="lead">
                Add new role and assign permissions.
            </div>
            <div class="container mt-4">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Sorry!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{ url('role/store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br />
                            @foreach($permission as $value)

                            <label>
                            <input type="checkbox" name="permission[]" class="name" value="{{ $value->id }}">
                                {{ $value->name }}
                            </label>
                            <br />
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Role</button>
                    <a href="{{ url('role/index') }}" class="btn btn-outline-warning">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
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