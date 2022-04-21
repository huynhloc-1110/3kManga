@extends('layouts.master')

@section('asset')
    @parent
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
@endsection

@section('title', 'Sign up')

@section('content')
<div class="main">
    <!-- Sign up form -->
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <p>Konichiwa!! Welcome to 3KMANGA</p>
                <br>
                <p></p>
                <form method="POST" class="register-form" id="register-form" action="{{ route('signup-user') }}">
                    @csrf
                    <span style="color:red;" >@error('name'){{$message}}@enderror</span>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="User Name"/>
                    </div>

                    <span style="color:red;" >@error('email'){{$message}}@enderror</span>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email"/>
                    </div>

                    <span style="color:red;" >@error('password'){{$message}}@enderror</span>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="pass" placeholder="Password"/>
                    </div>

                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                    @if (isset($success))
                        @if ($success)
                            <span style="color:green;" >You have successfully sign up!</span>
                        @else
                            <span style="color:red" >Something went wrong with the sign up process.</span>
                        @endif
                    @endif
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="dist/img/signup.jpg" alt="sign up image"></figure>
                <a href="{{ url('login') }}" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</div>

@endsection
