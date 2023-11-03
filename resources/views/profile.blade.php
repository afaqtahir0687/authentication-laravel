@extends('layouts.app')

@section('title', 'Profile')

@section('contents')
<h1 class="mb-0">My Profile</h1>
<hr />

<form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="">
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="card">
                <div class="card-header">My Profile</div>
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- <h4 class="text-right">Profile Settings</h4> -->
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <img class="img-profile rounded-circle" src="{{ asset('admin_assets/img/afaq.jpeg')}}" style="height: 150px; width:150px; margin-left:80px">
                        </div>
                    </div>
                    <div class="row" id="res"></div>
                    <div class="row mt-3">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="first name" value="{{ auth()->user()->name }}" readonly>
                            <div class="">
                                <label class="labels">Email</label>
                                <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center"><a href="dashboard" type="submit" id="btn" class="btn btn-info">Save Profile</a></div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection