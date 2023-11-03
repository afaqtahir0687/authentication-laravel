@extends('layouts.app')

@section('title', 'Create Student')

@section('contents')
<h1 class="mb-0">Add Post</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Post
    </div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf     
            {{-- <div class="row mb-3">
                <div class="col">
                    <label for="">User Name</label>
                    <select class="form-control" name="user_id" required>
                        @foreach($user as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
            <div class="row mb-3">
                <div class="col">
                    <label for="">Post Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="col">
                    <label for="">Post Text</label>
                    <input type="text" name="text" class="form-control" placeholder="Text" required>
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