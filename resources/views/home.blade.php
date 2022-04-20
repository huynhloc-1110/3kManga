@extends('layouts.master')

@section('asset')
    @parent
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('title', 'Home')
    
@section('content')
<div class="row">
  @if (isset($mangas))
      @foreach ($mangas as $manga)
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <br>
        <div class="small-box bg-info">
          <div class="card border-0 bg-light mb-2">
              <img src="{{ $manga->cover_url }}" alt="{{ $manga->name }}'s cover">
          </div>
          <a href="{{ url("manga-$manga->id") }}" class="small-box-footer">{{ $manga->name }} <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      @endforeach
  @endif
</div>
@endsection