@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Manga')


@section('content')

<div class="row" style="padding: 30px">
    <!-- Cover's Container -->
    <div class="col-xl-4">
        <div class="card mb-4 mb-xl-0">
            <div class="card-body text-center">
                <!-- Cover image -->
                <img src="{{ $manga->cover_url }}" alt="{{ $manga->name }}'s cover">
                <br><br>
                <!-- Following button -->
                @if (isset($attached))
                    @if ($attached == false)
                        <a href="{{ url("follow-$manga->id") }}" class="btn btn-outline-warning"><i class="fas fa-star"></i> Following</a>
                    @else
                        <a href="{{ url("unfollow-$manga->id") }}" class="btn btn-warning"><i class="fas fa-star"></i> Followed</a>
                    @endif
                @else
                    <button class="btn btn-outline-warning" disabled><i class="fas fa-star"></i> Following</button>
                    <br><br>
                    <span style="color:red;">You need to log in to use this feature.</span>
                @endif
            </div>
        </div>
    </div>
    <!-- Manga Details' Container -->
    <div class="col-xl-8">
        <!-- Manga Info's Container -->
        <div class="card mb-4">
            <div class="card-header">Manga Details</div>
            <div class="card-body">
                <form>
                    <!-- Manga name -->
                    <div class="mb-3">
                        <label class="small mb-1" for="manga-name">Manga Name</label>
                        <input class="form-control" id="manga-name" type="text" value="{{ $manga->name }}" readonly style="background-color: white">
                    </div>
                    <!-- Manga author -->
                    <div class="mb-3">
                        <label class="small mb-1" for="manga-author">Author</label>
                        <input class="form-control" id="manga-author" type="text" value="{{ $manga->author }}" readonly style="background-color: white">
                    </div>
                    <!-- Manga description -->
                    <div class="form-group">
                        <label >Description</label>
                        <textarea class="form-control" readonly rows="6" style="background-color: white; resize:none">{{ $manga->description }}</textarea>
                    </div>
                    <!-- Manga genres list -->
                    <div class="mb-3">
                        <label class="small mb-1">Manga Genres</label>
                        <br>
                        @if (sizeof($genres) > 0)
                            @foreach ($genres as $genre)
                            <a href="#" class="btn btn-secondary btn-md disabled" role="button" aria-disabled="true">{{ $genre->name }}</a>
                            @endforeach
                        @else
                            <p class='lead'><em>No genres were found.</em></p>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Chapter List's Container -->
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

            <!-- Pagination Nav -->
            <div class="row justify-content-center">
                {{ $chapters->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection