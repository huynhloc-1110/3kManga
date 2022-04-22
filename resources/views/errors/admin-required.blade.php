@extends('layouts.master')

@section('asset')
    @parent
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap');
        .content-wrapper{
            font-family: 'Merriweather', serif;
            margin: 0;
            text-align: center;
            color: black;
            user-select: none;
            padding-top: 18vh;
        }
        .content-wrapper .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }
        .content-wrapper h2{
            font-size: 150px;
            margin: 0;
            text-shadow: 15px 5px 2px rgb(223, 223, 223);
        }
        .content-wrapper h3{
            font-size: 40px;
            margin: 20px;
            text-shadow: 15px 5px 2px rgb(223, 223, 223);
        }
        .content-wrapper p{
            font-size: 18px;
            margin: 5px;
        }
        .content-wrapper p:last-of-type{
            margin-bottom: 35px;
        }
        .content-wrapper a{
            text-decoration: none; 
        }
        .content-wrapper img {
            width : 250px
        }
    </style>
@endsection

@section('title', 'Admin Required')

@section('content')
<div class="container">
    <img src="/dist/img/admin-required.gif" alt="admin required">
    <h3>Admin Required</h3>
    <p>You have to be an admin to use this system.</p>
</div>
@endsection