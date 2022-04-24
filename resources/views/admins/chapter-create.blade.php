@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Chapter Create')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Chapter Management</h2>
        </div>
        <p>Please fill this form and submit to create a new chapter in the database.</p>
        <form action="{{ url("adchapter-create-$manga->id") }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Manga Name -->
            <div class="form-group">
                <label>Manga Name</label>
                <input type="text" name="manga_name" class="form-control" value="{{ $manga->id }} - {{ $manga->name }}" readonly>
            </div>

            <!-- Chapter Name -->
            <span style="color:red;" >@error('name'){{$message}}@enderror</span>
            <div class="form-group">
                <label>Chapter Name</label>
                <input type="text" name="name" class="form-control" value="">
            </div>

            <!-- Images -->
            <div class="form-group">
                <label>Images</label>
                <br>
                <input type="file" name="images[]" multiple>
            </div>
            <input type="submit" name="savebtn" class="btn btn-primary" value="Save">
            <a href="{{ url("admin-chapter-$manga->id") }}" class="btn btn-default">Back</a>
        </form>
    </div>
</div>

@endsection