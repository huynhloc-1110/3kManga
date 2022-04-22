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
      <p>Please fill this form and submit to CRUD manga record in the database.</p>
      <form action="" method="post" >
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="username" class="form-control" value="">
          </div>
          <div class="form-group">
              <label>Author</label>
              <input type="text" name="username" class="form-control" value="">
          </div>
          <div class="form-group">
              <label >Description</label>
              <textarea class="form-control" rows="6"></textarea>
          </div>
          <div class="form-group">
              <label>Genres</label>
              <select class="custom-select tm-select-accounts" id="category">
                <option selected>Select category</option>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
              </select>
              <select class="custom-select tm-select-accounts" id="category">
                  <option selected>Select category</option>
                  <option value="1">A</option>
                  <option value="2">B</option>
                  <option value="3">C</option>
              </select>
              <select class="custom-select tm-select-accounts" id="category">
                  <option selected>Select category</option>
                  <option value="1">A</option>
                  <option value="2">B</option>
                  <option value="3">C</option>
              </select>
          </div> 
          <div class="form-group">
              <label>Cover</label>
              <br>
              <input type="file" name="images" value="">
          </div>

          <input type="submit" name="savebtn" class="btn btn-primary" value="Save">
          <a href="{{ url('admin-profile') }}" class="btn btn-default">Back</a>
      </form>
  </div>
</div>

@endsection