@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Account Create')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>User Account Management</h2>
        </div>
        <p>Please fill this form and submit to create an account in the database.</p>
        <form action="{{ url('account-create') }}" method="post" >
            @csrf
            <!-- Name -->
            <span style="color:red;" >@error('name'){{$message}}@enderror</span>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="name" class="form-control" value="">
            </div>
            <!-- Email -->
            <span style="color:red;" >@error('email'){{$message}}@enderror</span>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="">
            </div>
            <!-- Password -->
            <span style="color:red;" >@error('password'){{$message}}@enderror</span>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <input type="submit" name="savebtn" class="btn btn-primary" value="Save">
            <a href="{{ url('admin-account') }}" class="btn btn-default">Back</a>
        </form>
    </div>
</div>
@endsection