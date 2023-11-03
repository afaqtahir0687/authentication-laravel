@extends('layouts.app')

@section('title', 'Detail Teacher')

@section('contents')
<h1 class="mb-0">Show Teacher</h1>
<hr />

<div class="card">
    <!-- <div class="card-header">
        Add Teachers
    </div> -->
    <div class="card-body">
        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Name" required value="{{ ($teacher->name ?? '' )}}" readonly>
                </div>
                <div class="col">
                    <input type="text" name="email" class="form-control" placeholder="Email" required value="{{ ($teacher->email ?? '' )}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
        
                <div class="col">
                    <input type="text" name="address" class="form-control" placeholder="Address" required value="{{ ($teacher->address ?? '' )}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="qualification" class="form-control" placeholder="Qualification" required value="{{ ($teacher->qualification ?? '' )}}" readonly>
                </div>
                <div class="col">

                    <select id="inputState" class="form-control" name="gender" placeholder="Gender" required value="{{ ($teacher->gender ?? '' )}}" readonly>
                        <option selected>Choose...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="number" name="joining_date" class="form-control" placeholder="joining_date" required value="{{ ($teacher->joining_date ?? '' )}}" readonly>
                </div>
                <div class="col">
                    <input type="number" name="leave_date" class="form-control" placeholder="leave_date" required value="{{ ($teacher->leave_date ?? '' )}}" readonly >
                </div>
            </div>
        </form>
    </div>
</div>
@endsection