@extends('layouts.app')

@section('title', 'Create Task')

@section('contents')
<h1 class="mb-0">Add Task</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Task
    </div>
    <div class="card-body">
        <form action="{{ route('taskadd.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div>
                    <label for="title" class="all">Task Name</label>
                    <textarea type="text" class="form-control tinymce-editor " name="task" cols="30" rows="5" placeholder="Write some description here..."></textarea>
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