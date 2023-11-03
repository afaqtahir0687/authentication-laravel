@extends('layouts.app')

@section('title', 'Show Boook')

@section('contents')
<h1 class="mb-0">Detail Book</h1>
<hr />

<div class="card">
    <div class="card-header">
        Detail Book
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Book Name" required value="{{ $books->name }}" readonly>
            </div>
            <div class="col">
                <input type="text" name="author" class="form-control" placeholder="Author Name" required value="{{ $books->author }}" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="number" name="year" class="form-control" min="2000" max="2023" step="1" value="<?php echo date('Y'); ?>" required value="{{ $books->year }}" readonly />
            </div>
            <div class="col">
                <input type="number" name="price" class="form-control" min="200" max="500" step="1" value="<?php echo number_format('200'); ?>" required value="{{ $books->price }}" readonly />
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection