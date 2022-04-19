@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Manga')


@section('content')

<div class="row" style="padding: 30px">
    <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
            <div class="card-body text-center">
                <!-- Profile picture image-->
                <img src="dist/img/one_piece.jpg" alt="one_piece_cover">
                <br>
                <br>
                <button class="btn btn-outline-warning" type="button"><i class="fas fa-star"></i> Following</button>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Manga Details</div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputmanganame">Manga Name</label>
                        <input class="form-control" id="inputmanganame" type="text" placeholder="Enter manga name" value="One Piece" readonly style="background-color: white">
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputmanganame">Author</label>
                        <input class="form-control" id="inputmanganame" type="text" placeholder="Enter manga name" value="One Piece" readonly style="background-color: white">
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <textarea class="form-control" readonly rows="6" style="background-color: white"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Manga Genres</label>
                        <br>
                        <a href="#" class="btn btn-secondary btn-md disabled" role="button" aria-disabled="true">a</a>
                        <a href="#" class="btn btn-secondary btn-md disabled" role="button" aria-disabled="true">b</a>
                        <a href="#" class="btn btn-secondary btn-md disabled" role="button" aria-disabled="true">c</a>
                    </div>
                    <!-- Form Group (hidden upload)-->
                    <input type="file" id="file_input" hidden>
                </form>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Chapters List</div>
            <div class="card-body">
                @php
                $row = [
                    'name' => 'chapter 1 - abc',
                    'update-date' => '19/04/2022',
                ];
                @endphp

                @if (true)
                <table class='table table-bordered table-striped'>
                    <tbody>
                    @for ($i = 0; $i < 3; $i++) 
                        <tr>
                        <td><a href="{{ url('chapter') }}">{{ $row['name'] }}</a></td>                                        
                        <td>{{ $row['update-date'] }}</td>
                        </tr>
                    @endfor
                    </tbody>                            
                </table>
                @else
                    <p class='lead'><em>No records were found.</em></p>
                @endif
            </div>
        </div>
    </div>
    
</div>
@endsection