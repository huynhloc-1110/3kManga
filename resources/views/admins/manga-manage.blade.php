@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Manga Management')


@section('content')
<div class="container">
  </div>
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
            
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="page-header clearfix">
            <br><br>
            <h2 class="pull-left">Manga Details</h2>
        </div>

        @php
            $row = [
                'id' => '1',
                'name' => 'AOT',
                'cover' => 'dist/img/avatar.png',
            ];
        @endphp

        @if (true)
       <table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>Id</th>                                      
                    <th>Name</th>
                    <th>Cover</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < 3; $i++) 
                <tr>
                <td>{{ $row['id'] }}</td>                                        
                <td>{{ $row['name'] }}</td>
                <td><img src = "{{ $row['cover'] }}" alt="{{ $row['name'] }}'s cover" width="50px"></td>
                <td>
                <a href='index.php?act=update&id="{{ $row['id'] }}"' title='Update Record' data-toggle='tooltip'><i class='fa fa-edit'></i></a>
                <a href='index.php?act=delete&id="{{ $row['id'] }}"' title='Delete Record' data-toggle='tooltip'><i class='fa fa-trash'></i></a>
                </td>
                </tr>
            @endfor
            </tbody>                            
        </table>
        @else
            <p class='lead'><em>No records were found.</em></p>
        @endif
    </div>
</div> 
  @endsection