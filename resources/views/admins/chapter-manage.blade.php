@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Chapter Management')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header clearfix">
            <br>
            <h2 class="pull-left">Chapter Details</h2>
            <br>
        </div>

        <!-- Create new chapter button -->
        <a href="{{ url("adchapter-create-$manga->id") }}" class="btn btn-primary">Create a new chapter</a>
        <br><br>
        
        <div class="form-group">
            <label>Manga Name</label>
            <input class="form-control" type="text" readonly value="{{ $manga->id }} - {{ $manga->name }}">
        </div>

        @if (isset($chapters))
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
            @foreach ($chapters as $chapter)
                <tr>
                <td>{{ $chapter->id }}</td>                                        
                <td>{{ $chapter->name }}</td>
                <td>{{ $chapter->updated_at }}</td>
                <td>
                <a href="" title='Update Record' data-toggle='tooltip'><i class='fa fa-edit'></i></a>
                <a href="{{ url("adchapter-delete-$chapter->id") }}" title='Delete Record' data-toggle='tooltip'><i class='fa fa-trash'></i></a>
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