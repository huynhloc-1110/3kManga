@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Account Management')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header clearfix">
            <br>
            <h2 class="pull-left">User Account Details</h2>
            <br>
        </div>

        <!-- Create new account button -->
        <a href="{{ url('account-create') }}" class="btn btn-primary">Create a new account</a>
        <br><br>

        <!-- Account list show -->
        @if (isset($users))
       <table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>Id</th>                                      
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                <td>{{ $user->id }}</td>                                        
                <td>{{ $user->name }}</td>
                <td>{{ $user->email}}</td>
                <td>
                <a href="{{ url("account-update-$user->id") }}" title='Update Record' data-toggle='tooltip'><i class='fa fa-edit'></i></a>
                <a href="{{ url("account-delete-$user->id") }}" title='Delete Record' data-toggle='tooltip'><i class='fa fa-trash'></i></a>
                </td>
                </tr>
            @endforeach
            </tbody>                            
        </table>
        @else
            <p class='lead'><em>No records were found.</em></p>
        @endif
    </div>
</div>

<!-- Pagination Nav -->
<div class="row justify-content-center">
    {{ $users->links('pagination::bootstrap-4') }}
</div>
@endsection