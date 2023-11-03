@extends('layouts.app')

@section('title', 'Create Category')

@section('contents')
<style>
    .btn {
        color: white;
        border: 3px solid navy;
        border-radius: 10px;
        padding: 15px 30px;
        text-transform: uppercase;
        font-weight: bold;
        margin-left: 200px;
    }
</style>
<h1 class="mb-0">Add Category</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Category
    </div>
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <input type="text" name="name" class="form-control" required placeholder="Add New Cactegory">
            </div>
            <div class="row mt-4">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection