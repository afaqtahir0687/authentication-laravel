@extends('layouts.app')

@section('title', 'Create Student')

@section('contents')
<h1 class="mb-0">Add Student</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Student
    </div>
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Name" required value="{{ ($student->name ?? '' )}}" readonly>
                </div>
                <div class="col">
                    <input type="text" name="email" class="form-control" placeholder="Email" required value="{{ ($student->email ?? '' )}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
        
                <div class="col">
                    <input type="number" name="fees" class="form-control" placeholder="Fees" required value="{{ ($student->fees ?? '' )}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="nationality" class="form-control" placeholder="Nationality" required value="{{ ($student->nationality ?? '' )}}" readonly>
                </div>
                <div class="col">

                    <select id="inputState" class="form-control" name="gender" placeholder="Gender" required value="{{ ($student->gender ?? '' )}}" readonly>
                        <option selected>Choose...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
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