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
                <h1>{{ $manga->name }}</h1>
                <h3>{{ $chapter->name }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-12 m-auto text-center">
        @foreach ($images as $image)
        <img src="{{ $image->url }}" alt="Image no.{{ $image->id }}" style="max-width: 100%">
        @endforeach
    </div>
    <div class="col-lg-6 m-auto text-center">
        <br>
        @if (!is_null($previous))
            <a href="{{ url("chapter-$previous") }}" class="btn btn-primary">Previous Chapter</a>
        @endif
        <a href="{{ url("manga-$manga->id") }}" class="btn btn-success">Return to Manga Page</a>
        @if (!is_null($next))
            <a href="{{ url("chapter-$next") }}" class="btn btn-primary">Next Chapter</a>
        @endif
    </div>
</div>
@endsection