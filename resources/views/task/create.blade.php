@extends('layouts.app')
  
@section('title', 'Create Department')
  
@section('contents')
    <h1 class="mb-0">Add Department</h1>
    <hr />

    <div class="card">
        <div class="card-header">
            Add Task
        </div>
        <div class="card-body">
            <form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="name" class="form-control" placeholder="Add New Department" required>
                    </div>
                </div>
                <div class="row">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
