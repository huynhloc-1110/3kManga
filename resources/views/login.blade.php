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
            <div class="signin-image">
                <figure><img src="dist/img/login.jpg" alt="log in image"></figure>
                <a href="{{ url('signup') }}" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Log in</h2>
                <p>Dive in to the world of manga series!</p>
                <br>
                <p></p>
                <form method="POST" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="your_email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        <input type="submit" name="signin" id="signin" class="form-submit2" value="Log in as admin"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

