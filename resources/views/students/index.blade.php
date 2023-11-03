@extends('layouts.app')

@section('title', 'Home Student')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Student</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>
<hr />
<table class="table table-hover">
    <thead class="table-primary text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Fees</th>
            <th scope="col">Nationality</th>
            <th scope="col">Gender</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody style="text-align:center;">
        @foreach($student as $item)
        <tr>
            <td>{{ $item->id ?? '' }}</td>
            <td>{{ $item->name ?? '' }}</td>
            <td>{{ $item->email ?? '' }}</td>
            <td>{{ $item->fees ?? '' }}</td>
            <td>{{ $item->nationality ?? '' }}</td>
            <td>{{ $item->gender ?? '' }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ url('students/show', $item->id) }}" class="btn btn-dark btn-lg"><i class="fas fa-file"></i></a>
                    <a href="{{ url('students/edit', $item->id) }}" class="btn btn-warning btn-lg"><i class="fas fa-pen"></i></a>
                    <a href="{{ url('students/delete', $item->id) }}" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection