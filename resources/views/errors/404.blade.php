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
        .content-wrapper img {
            border-radius: 50%;
            width : 200px;
        }
    </style>
@endsection

@section('title', '404 Not Found')

@section('content')
<div class="container">
    <img src="/dist/img/bonk.gif" alt="bonk">
    <h2>404</h2>
    <h3>Oops, nothing here...</h3>
</div>
@endsection