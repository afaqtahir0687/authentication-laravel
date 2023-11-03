@extends('layouts.app')
  
@section('title', 'Home Department')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Department</h1>
        <a href="{{ route('task.create') }}" class="btn btn-primary">Add Department</a>
    </div>
    <hr/>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
                @foreach($task as $department)
                    <tr>
                    <td>{{ $department->id ?? '' }}</td>
                    <td>{{ $department->company_name ?? '' }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('task.show', $department->id) }}" type="button" class="btn btn-secondary">Show</a>
                                <a href="{{ route('task.edit', $department->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('task.destroy', $department->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
@endsection