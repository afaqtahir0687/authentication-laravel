@extends('layouts.app')

@section('title', 'Home Student')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Post</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
</div>
<hr/>
<table class="table table-hover">
    <thead class="table-primary text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Image</th>
            <th scope="col">Text</th>
            {{-- <th scope="col">Action</th> --}}
        </tr>
    </thead>
    <tbody style="text-align:center;">
        @foreach($posts as $item)
        <tr>
            <td>{{ $item->id ?? '' }}</td>
            <td>{{ $item->user->name }}</td>
            <td>
                @if ($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="Post Image" style="border-radius: 55px" width="100" height="100">
                @endif
            </td>
            <td>{{ $item->text ?? '' }}</td>
            {{-- <td>
                <div class="">
                    <a href="{{ url('posts/show', $item->id) }}" class="btn btn-dark">Show</a>
                    <a href="{{ url('posts/edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ url('posts/delete', $item->id) }}" class="btn btn-danger">Delete</a>
                </div>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@endsection