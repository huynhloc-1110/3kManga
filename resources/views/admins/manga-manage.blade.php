@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Manga Management')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-header clearfix">
            <br>
            <h2 class="pull-left">Manga Details</h2>
            <br>
        </div>

        <!-- Create new manga button -->
        <a href="{{ url('admanga-create') }}" class="btn btn-primary">Create a new manga</a>
        <br><br>
        
        @if (isset($mangas))      
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
            @foreach($mangas as $manga)
                <tr>
                <td>{{ $manga->id }}</td>                                        
                <td>{{ $manga->name }}</td>
                <td><img src="{{ $manga->cover_url }}" alt="{{ $manga->name }}'s cover" width="50px"></td>
                <td>
                <a href="{{ url("admanga-update-$manga->id") }}" title='Update Record' data-toggle='tooltip'><i class='fa fa-edit'></i></a>
                <a href="{{ url("admanga-delete-$manga->id") }}" title='Delete Record' data-toggle='tooltip'><i class='fa fa-trash'></i></a>
                <br><br>
                <a href="{{ url("admin-chapter-$manga->id") }}" class="btn btn-success">Edit chapters</a>
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
  @endsection