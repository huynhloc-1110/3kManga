@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Manga Update')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
          <h2>Manga Management</h2>
        </div>
        <p>Please fill this form and submit to add a new manga in the database.</p>
        <form action="{{ url("admanga-update-$manga->id") }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $manga->name }}">
            </div>
            <!-- Author -->
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="{{ $manga->author }}">
            </div>
            <!-- Description -->
            <div class="form-group">
                <label >Description</label>
                <textarea class="form-control" name="description" rows="6" value="{{ $manga->description }}"></textarea>
            </div>

            <!-- Cover -->
            <div class="form-group">
                <label>Cover</label>
                <br>
                <input type="file" name="cover" >
                <img src="{{ asset('storage/mangas/'.$manga->cover_url) }}" alt="{{ $manga->name }}'s cover">
            </div>

            <!-- Submit and Back buttons -->
            <input type="submit" name="savebtn" class="btn btn-primary" value="Save">
            <a href="{{ url('admin-manga') }}" class="btn btn-default">Back</a>
        </form>
    </div>
</div>

@endsection