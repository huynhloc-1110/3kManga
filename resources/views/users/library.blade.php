@extends('layouts.master')

@section('asset')
    @parent
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('title', 'Library')
    
@section('content')
<div class="row">
    @for ($j = 0; $j < 8; $j++)
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="card border-0 bg-light mb-2">
            <img src="dist/img/one_piece.jpg" alt="one_piece_cover">
        </div>
        <a href="#" class="small-box-footer">One Piece <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @endfor
</div>
@endsection