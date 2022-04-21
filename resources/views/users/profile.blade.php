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
                <img class="img-account-profile rounded-circle mb-2" src="{{ $user->avatar_url }}" alt="">
                <!-- Profile picture help block-->
                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
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
                <form>
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">Username</label>
                        <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="{{ $user->name }}" readonly style="background-color: white">
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{ $user->email }}" readonly style="background-color: white">
                    </div>
                    <!-- Form Group (hidden upload)-->
                    <input type="file" id="file-input" onchange="checkUploaded()" hidden>

                    <!-- Save changes button-->
                    <input class="btn btn-primary" type="submit" value="Save changes">
                    <a href="{{ url('logout') }}" class="btn btn-danger" type="button">Log out</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection