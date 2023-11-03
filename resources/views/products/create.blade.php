@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
    <h1 class="mb-0">Add Product</h1>
    <hr />

    <div class="card">
        <div class="card-header">
            Add Product
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="col">
                        <input type="text" name="price" class="form-control" placeholder="Price" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="product_code" class="form-control" placeholder="Product Code" required>
                    </div>
                    <div class="col">
                        <textarea class="form-control" name="description" placeholder="Description" required></textarea>
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
