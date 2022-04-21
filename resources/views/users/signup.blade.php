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
    <div class="container">
        <div class="signup-content">
            <!-- Sign up form's container -->
            <div class="signup-form">
                <!-- Introduction -->
                <h2 class="form-title">Sign up</h2>
                <p>Konichiwa!! Welcome to 3KMANGA</p>
                <br>

                <!-- Form -->
                <form method="POST" class="register-form" id="register-form" action="{{ route('signup-user') }}">
                    @csrf
                    <!-- Username -->
                    <span style="color:red;" >@error('name'){{$message}}@enderror</span>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="User Name"/>
                    </div>

                    <!-- Email -->
                    <span style="color:red;" >@error('email'){{$message}}@enderror</span>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email"/>
                    </div>

                    <!-- Password -->
                    <span style="color:red;" >@error('password'){{$message}}@enderror</span>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="pass" placeholder="Password"/>
                    </div>

                    <!-- Submit button -->
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>

                    @if (isset($success))
                    <!-- Sucess/Failure notification -->
                        @if ($success)
                            <span style="color:green;" >You have successfully sign up!</span>
                        @else
                            <span style="color:red" >Something went wrong with the sign up process.</span>
                        @endif
                    @endif
                </form>
            </div>
            
            <!-- Sign up image's decoration, link to login view -->
            <div class="signup-image">
                <figure><img src="dist/img/signup.jpg" alt="sign up image"></figure>
                <a href="{{ url('login') }}" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</div>

@endsection
