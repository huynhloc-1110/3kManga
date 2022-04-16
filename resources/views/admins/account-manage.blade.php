@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Account Management')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>User Account Management</h2>
        </div>
        <p>Please fill this form and submit to CRUD account record in the database.</p>
        <form action="" method="post" >
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <input type="submit" name="savebtn" class="btn btn-primary" value="Save">
            <a href="" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="page-header clearfix">
            <br><br>
            <h2 class="pull-left">User Account Details</h2>
        </div>

        @php
            $row = [
                'id' => '1',
                'username' => 'loc',
                'email' => 'loc@gmail.com',
                'password' => '123',
            ];
        @endphp

        @if (true)
       <table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>Id</th>                                      
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < 3; $i++) 
                <tr>
                <td>{{ $row['id'] }}</td>                                        
                <td>{{ $row['username'] }}</td>
                <td>{{ $row['email'] }}</td>
                <td>{{ $row['password'] }}</td>
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