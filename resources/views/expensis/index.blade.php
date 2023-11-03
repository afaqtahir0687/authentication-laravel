@extends('layouts.app')

@section('title', 'Home Expensis')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Expensis</h1>
    <a href="{{ route('expensis.create') }}" class="btn btn-primary">Add Expensis</a>
</div>
<hr />
<table class="table table-hover">
    <thead class="table-primary text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody style="text-align:center;">
        @foreach($expensis as $item)
        <tr>
            <td>{{ $item->id ?? '' }}</td>
            <td>{{ $item->name ?? '' }}</td>
            <td>{{ $item->description ?? '' }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ url('expensis/show', $item->id) }}" class="btn btn-dark btn-lg"><i class="fas fa-file"></i></a>
                    <a href="{{ url('expensis/edit', $item->id) }}" class="btn btn-warning btn-lg"><i class="fas fa-pen"></i></a>
                    <a href="{{ url('expensis/delete', $item->id) }}" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection