@extends('layouts.master')

@section('asset')
    @parent
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
@endsection

@section('title', 'Log in')

@section('content')
<div class ="main">
    <div class="container">
        <div class="signin-content">
            <!-- Signup image container -->
            <div class="signin-image">
                <figure><img src="dist/img/login.jpg" alt="log in image"></figure>
                <a href="{{ url('signup') }}" class="signup-image-link">Create an account</a>
            </div>
            <!-- Signup image form -->
            <div class="signin-form">
                <h2 class="form-title">Log in</h2>
                <p>Dive in to the world of manga series!</p>
                <br>
                <form method="post" class="register-form" id="login-form" action="{{ url('login-submit') }}">
                    @csrf
                    <!-- Email -->
                    <span style="color:red;" >@error('email'){{$message}}@enderror</span>
                    <div class="form-group">
                        <label for="your_email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}"/>
                    </div>
                    <!-- Password -->
                    <span style="color:red;" >@error('password'){{$message}}@enderror</span>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password"/>
                    </div>
                    <!-- Error -->
                    <span style="color:red;" >@error('login'){{$message}}@enderror</span>
                    <!-- Submit button -->
                    <div class="form-group form-button">
                        <input type="submit" name="user" id="login" class="form-submit" value="Log in"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

