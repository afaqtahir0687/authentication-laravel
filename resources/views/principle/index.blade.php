@extends('layouts.app')

@section('title', 'Home Principle')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Principle</h1>
    <a href="{{ route('principle.create') }}" class="btn btn-primary">Add Principle</a>
</div>
<hr />
<table class="table table-hover">
    <thead class="table-primary text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Qualification</th>
            <th scope="col">Gender</th>
            {{-- <th scope="col">Join Date</th>
            <th scope="col">Leave Date</th> --}}
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody style="text-align:center;">
        @foreach($principle as $item)
        <tr>
            <td> {{ $item->id ?? '' }}</td>
            <td> {{ $item->name ?? '' }}</td>
            <td>{{ $item->email ?? '' }}</td>
            <td>{{ $item->address ?? '' }}</td>
            <td>{{ $item->qualification ?? '' }}</td>
            <td>{{ $item->gender ?? '' }}</td>
            {{-- <td>{{ $item->joining_date ?? '' }}</td>
            <td>{{ $item->leave_date ?? '' }}</td> --}}
            <td>
                <div class="btn-group">
                    <a href="{{ url('principle/show', $item->id) }}" class="btn btn-dark btn-lg"><i class="fas fa-file"></i></a>
                    <a href="{{ url('principle/edit', $item->id) }}" class="btn btn-warning btn-lg"><i class="fas fa-pen"></i></a>
                    <a href="{{ url('principle/delete', $item->id) }}" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection