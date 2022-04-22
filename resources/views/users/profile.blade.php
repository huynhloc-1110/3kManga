@extends('layouts.master')

@section('asset')
    @parent
    <script>
        function checkUploaded() {
            var file = document.getElementById('file-input');
            var noti = document.getElementById('noti');
            if (file.files.length > 0) {
                noti.innerHTML = "An image has been chosen";
            } else {
                noti.innerHTML = "";
            }
        }
    </script>
@endsection

@section('title', 'User Profile')


@section('content')

<div class="row" style="padding: 30px">
    <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
            <div class="card-header">Profile Picture</div>
            <div class="card-body text-center">
                <!-- Profile picture image-->
                <img class="img-account-profile rounded-circle mb-2" src="{{ $user->avatar_url }}" alt="{{ $user->name }}'s avatar" width="215">
                <!-- Profile picture help block-->
                <div class="small font-italic text-muted mb-4">Image no larger than 5 MB</div>
                <!-- Profile picture upload button-->
                <button class="btn btn-primary" type="button" onclick="document.getElementById('file-input').click()">Upload new image</button>
                <br>
                <span style="color:green;" id="noti"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Account Details</div>
            <div class="card-body">
                <form method="post" action="{{ url('/change-profile') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="name">Username</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="{{ $user->name }}" value="{{ $user->name }}">
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="email">Email address</label>
                        <input class="form-control" id="email" name="email" type="email" placeholder="{{ $user->email }}" value="{{ $user->email }}">
                    </div>
                    <!-- Form Group (hidden upload)-->
                    <input type="file" id="file-input" name="avatar" onchange="checkUploaded()" hidden>

                    <!-- Save changes button-->
                    <input class="btn btn-primary" type="submit" value="Save changes">
                    <a href="{{ url('logout') }}" class="btn btn-danger" type="button">Log out</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection