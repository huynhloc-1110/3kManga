@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Manga Create')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
          <h2>Manga Management</h2>
        </div>
        <p>Please fill this form and submit to add a new manga in the database.</p>
        <form action="{{ url('admanga-create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="">
            </div>
            <!-- Author -->
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="">
            </div>
            <!-- Description -->
            <div class="form-group">
                <label >Description</label>
                <textarea class="form-control" name="description" rows="6"></textarea>
            </div>
            <!-- Genres -->
            <div class="form-group">
                <label>Genres</label>
                <select name="genre-1" class="custom-select tm-select-accounts" id="category">
                    <option selected>Select category</option>
                    @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <select name="genre-2" class="custom-select tm-select-accounts" id="category2">
                    <option selected>Select category</option>
                    @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <select name="genre-3" class="custom-select tm-select-accounts" id="category3">
                    <option selected>Select category</option>
                    @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Cover -->
            <div class="form-group">
                <label>Cover</label>
                <br>
                <input type="file" name="cover">
            </div>

            <!-- Submit and Back buttons -->
            <input type="submit" name="savebtn" class="btn btn-primary" value="Save">
            <a href="{{ url('admin-manga') }}" class="btn btn-default">Back</a>
        </form>
    </div>
</div>

@endsection