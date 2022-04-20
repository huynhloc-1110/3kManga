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
                <img src="{{ $manga->cover_url }}" alt="{{ $manga->name }}'s cover">
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
                        <input class="form-control" id="inputmanganame" type="text" placeholder="Enter manga name" value="{{ $manga->name }}" readonly style="background-color: white">
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputmanganame">Author</label>
                        <input class="form-control" id="inputmanganame" type="text" placeholder="Enter manga name" value="{{ $manga->author }}" readonly style="background-color: white">
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <textarea class="form-control" readonly rows="6" style="background-color: white; resize:none">{{ $manga->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Manga Genres</label>
                        <br>
                        @foreach ($genres as $genre)
                        <a href="#" class="btn btn-secondary btn-md disabled" role="button" aria-disabled="true">{{ $genre->name }}</a>
                        @endforeach
                    </div>
                    <!-- Form Group (hidden upload)-->
                    <input type="file" id="file_input" hidden>
                </form>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Chapters List</div>
            <div class="card-body">

                @if (sizeof($chapters) > 0)
                <table class='table table-bordered table-striped'>
                    <tbody>
                    @foreach ($chapters as $chapter)
                        <tr>
                        <td><a href="{{ url("chapter-$chapter->id") }}">{{ $chapter->name }}</a></td>                                        
                        <td>{{ $chapter->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>                            
                </table>
                @else
                    <p class='lead'><em>No chapters were found.</em></p>
                @endif
            </div>
        </div>
    </div>
    
</div>
@endsection