@extends('layouts.app')

@section('title', 'Create Expensis')

@section('contents')
<h1 class="mb-0">Add Expensis</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Expensis
    </div>
    <div class="card-body">
        <form action="{{ route('expensis.update', $expensis->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Name" required value="{{ ($expensis->name ?? '')}}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="description" class="form-control" placeholder="Description" required value="{{ ($expensis->description) }}" readonly>
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