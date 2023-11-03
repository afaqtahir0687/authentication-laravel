@extends('layouts.app')

@section('contents')
<div class="bg-light p-4 rounded">
    <div class="card">
        <div class="card-header">
            <h1>Add new Permission</h1>
        </div>
        <div class="card-body">
            <!-- <div class="lead">
                Add new role and assign permissions.
            </div> -->
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
                <form method="POST" action="{{ url('permission/store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Guard Name</label>
                        <input value="{{ old('guard_name') }}" type="text" class="form-control" name="guard_name" placeholder="Guard Name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Permission</button>
                    <a href="{{ url('permission/index') }}" class="btn btn-info">Back</a>
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