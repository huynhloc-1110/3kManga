@extends('layouts.master')

@section('asset')
    @parent
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('title', 'Home')
    
@section('content')
<div class="col-md-4 offset-md-4 pt-3">
  <form method="get">
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="search" placeholder="Search ......" aria-label="Recipient's username">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </form>
</div>
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