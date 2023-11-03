@extends('layouts.app')
  
@section('title', 'Edit Department')
  
@section('contents')
    <h1 class="mb-0">Edit Department</h1>
    <hr />

    <div class="card">
        <div class="card-header">
            Edit Task
        </div>
        <div class="card-body">
            <form action="{{ route('task.update', $task->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="name" class="form-control" placeholder="Add New Department" required value="{{ ($task->company_name ?? '')}}">
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