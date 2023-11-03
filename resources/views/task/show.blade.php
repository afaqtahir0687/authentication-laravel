@extends('layouts.app')

@section('title', 'Show Department')
<style>
    .submit{
    margin-left: 120px;
    border-radius: 10px;
    height: 45px;
    background: blue;
    color: honeydew;
    font-weight: bold;
    }
</style>
@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Department Details</h1>
    <a href="{{ url('task') }}" class="btn btn-warning">List Department</a>
</div>
<hr />

<h2>Search by Month</h2>
<form action="{{ route('task.show', ['id' => $task->id]) }}" method="GET">
    @csrf
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-4">
                <label for="month">Select Month:</label>
                <input type="month" id="month" name="month" class="form-control" value="{{date('Y-m')}}">
                <input type="hidden" name="id" value="{{ $task->id }}">

                <button type="submit" class="btn btn-primary mt-4 submit" style="padding-right:30px; padding-left:30px;">Search</button>
            </div>
        </div>
    </div>

</form>

<p>Company Name: {{ $task->company_name }}</p>

<h2>Current Month</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dates as $date)
            <tr>
                <td>{{ $date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection