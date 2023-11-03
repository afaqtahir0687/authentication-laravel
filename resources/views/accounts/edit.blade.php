@extends('layouts.app')

@section('title', 'Create Account')

@section('contents')
<h1 class="mb-0">Add Account</h1>
<hr />

<div class="card">
    <div class="card-header">
        Add Account
    </div>
    <div class="card-body">
        <form action="{{ route('accounts.update', $account->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <select class="form-control" name="student_id">
                        @foreach($student as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">

                <div class="col">
                    <input type="number" name="fees" class="form-control" placeholder="Fees" required value="{{ ($account->fees ?? '') }}">
                </div>

                <div class="col">
                    <input type="number" name="month" class="form-control" placeholder="Month" required value="{{ ($account->month ?? '') }}">
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