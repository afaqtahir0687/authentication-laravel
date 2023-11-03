@extends('layouts.app')

@section('title', 'Create Principle')

@section('contents')
<h1 class="mb-0">Add Principle</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Principle
    </div>
    <div class="card-body">
        <form action="{{ route('principle.update', $principle->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Name" required value="{{ ($principle->name ?? '' )}}">
                </div>
                <div class="col">
                    <input type="text" name="email" class="form-control" placeholder="Email" required value="{{ ($principle->email ?? '' )}}">
                </div>
            </div>
            <div class="row mb-3">
        
                <div class="col">
                    <input type="text" name="address" class="form-control" placeholder="Address" required value="{{ ($principle->address ?? '' )}}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="qualification" class="form-control" placeholder="Qualification" required value="{{ ($principle->qualification ?? '' )}}">
                </div>
                <div class="col">

                    <select id="inputState" class="form-control" name="gender" placeholder="Gender" required value="{{ ($principle->gender ?? '' )}}">
                        <option selected>Choose...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            {{-- <div class="row mb-3">
                <div class="col">
                    <input type="number" name="joining_date" class="form-control" placeholder="joining_date" required value="{{ ($principle->joining_date ?? '' )}}">
                </div>
                <div class="col">
                    <input type="number" name="leave_date" class="form-control" placeholder="leave_date" required value="{{ ($principle->leave_date ?? '' )}}">
                </div>
            </div> --}}

            <div class="row">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection