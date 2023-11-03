@extends('layouts.app')

@section('title', 'Home Attribute')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Category</h1>
    <a href="{{ route('attribute.create') }}" class="btn btn-primary">Add Category</a>
</div>
<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Attribute Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>+
        @foreach($attribute as $item)
        <tr>
            <td class="align-middle">{{ $item->id }}</td>
            <td class="align-middle">{{ $item->name }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ url('attribute/show', $item->id) }}" class="btn btn-dark btn-sm">Show</a>
                    <a href="{{ url('attribute/edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ url('attribute/delete', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection