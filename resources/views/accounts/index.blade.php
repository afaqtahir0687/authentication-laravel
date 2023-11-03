@extends('layouts.app')

@section('title', 'Account List')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Account List</h1>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary">Add Account</a>
</div>
<hr />

<table class="table table-hover">
    <thead class="table-primary text-center">
        <tr>
            <th scope="col">Account ID</th>
            <th scope="col">Student ID</th>
            <th scope="col">Month</th>
            <th scope="col">Student Name</th>
            <th scope="col">Fees</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody style="text-align:center;">
        @foreach($accounts as $account)
        <tr>
            <td>{{ $account->id ?? '' }}</td>
            <td>{{ $account->student->id ?? '' }}</td>
            <td>{{ $account->created_at->format('d F Y') }}</td>
            <td>{{ $account->student->name ?? '' }}</td>
            <td>{{ $account->fees ?? '' }}</td>
            <td>
                @if ($account->created_at->format('m') == $currentMonth)
                Paid
                @else
                Unpaid
                @endif
            </td>
            <td>
                <div class="btn-group">
                    <a href="{{ url('accounts/show', $account->id) }}" class="btn btn-dark btn-sm">Show</a>
                    <a href="{{ url('accounts/edit', $account->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ url('accounts/delete', $account->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection