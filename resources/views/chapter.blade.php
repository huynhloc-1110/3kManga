@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Chapter')

@section('content')
<div class="row py-5">
    <div class="col-lg-6 m-auto text-center">
        <div class="card mb-4">
            <div class="card-body">
                <h1>One Piece</h1>
                <h3>Chap 1 - abc</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-12 m-auto text-center">
        <img src="dist/img/chap-1.1.jpg" alt="chap-1.1" style="max-width: 100%">
    </div>
    <div class="col-lg-6 m-auto text-center">
        <br>
        <a href="{{ url('manga') }}" class="btn btn-primary">Return to Manga Page</a>
    </div>
</div>
@endsection