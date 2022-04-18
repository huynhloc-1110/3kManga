@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Profile')


@section('content')

<div class="row" style="padding: 30px">
    <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
            <div class="card-header">Admin Profile Picture</div>
            <div class="card-body text-center">
                <!-- Profile picture image-->
                <img class="img-account-profile rounded-circle mb-2" src="dist/img/avatar.png" alt="">
                <!-- Profile picture help block-->
                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                <!-- Profile picture upload button-->
                <button class="btn btn-primary" type="button" onclick="document.getElementById('file_input').click()">Upload new image</button>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Admin Account Details</div>
            <div class="card-body">
                <form>
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">Username</label>
                        <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="Alexander Pierce">
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com">
                    </div>
                    <!-- Form Group (hidden upload)-->
                    <input type="file" id="file_input" hidden>

                    <!-- Save changes button-->
                    <input class="btn btn-primary" type="submit" value="Save changes">
                </form>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Admin Features</div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{ url('admin-account') }}">Account Manage</a>
                <a class="btn btn-primary" href="{{ url('admin-manga') }}">Manga Manage</a>
                <a class="btn btn-primary" href="{{ url('admin-chapter') }}">Chapter Manage</a>
            </div>
        </div>
    </div>
    
</div>
@endsection