@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Chapter Management')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Chapter Management</h2>
        </div>
        <p>Please fill this form and submit to CRUD chapter the database.</p>
        <form action="" method="post" >
            <div class="form-group">
                <label>Manga Name</label>
                <select class="custom-select tm-select-accounts">
                  <option selected>Select Manga Name</option>
                  <option value="1">A</option>
                  <option value="2">B</option>
                  <option value="3">A</option>
                </select>
            </div>
            <div class="form-group">
                <label>Chapter Name</label>
                <input type="email" name="chaptername" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Images</label>
                <br>
                <input type="file" name="images" multiple value="">
            </div>
            <input type="submit" name="savebtn" class="btn btn-primary" value="Save">
            <a href="{{ url('admin-profile') }}" class="btn btn-default">Back</a>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="page-header clearfix">
            <br><br>
            <h2 class="pull-left">Chapter Details</h2>
        </div>

        @php
            $row = [
                'id' => '1',
                'chapter-name' => 'loc',
                'updated-at' => 'loc@gmail.com',
            ];
        @endphp

        @if (true)
       <table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>Id</th>                                      
                    <th>Chapter Name</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < 3; $i++) 
                <tr>
                <td>{{ $row['id'] }}</td>                                        
                <td>{{ $row['chapter-name'] }}</td>
                <td>{{ $row['updated-at'] }}</td>
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