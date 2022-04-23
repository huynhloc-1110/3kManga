@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Admin Profile')


@section('content')

<div class="row" style="padding: 30px">
    <div class="col-xl-4">
        <!-- Admin picture card-->
        <div class="card mb-4 mb-xl-0">
            <div class="card-header">Admin Profile Picture</div>
            <div class="card-body text-center">
                <!-- Admin picture image-->
                <img class="img-account-profile rounded-circle mb-2" src="dist/img/AdminLTELogo.png" alt="Admin Icon" width="215">
                <div class="font-italic text-muted mb-4">Welcome, admin!</div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <!-- Admin Features -->
        <div class="card mb-4">
            <div class="card-header">Admin Features</div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{ url('admin-account') }}">Account Manage</a>
                <a class="btn btn-primary" href="{{ url('admin-manga') }}">Manga Manage</a>
            </div>
        </div>
    </div>
    
</div>
@endsection