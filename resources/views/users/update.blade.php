@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Update')

@section('content')
<!-- Search bar -->
<div class="col-md-4 offset-md-4 pt-3">
  <form method="get">
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="search" placeholder="Search ......" aria-label="Recipient's username">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </form>
</div>

<!-- Update list -->
<div class="row">
    <div class="col-md-12">
        <div class="page-header clearfix">
            <br><br>
            <h2 class="pull-left">Update list</h2>
        </div>

        @if (isset($updates))
       <table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>Cover</th>                                      
                    <th>Name</th>
                    <th>Chapter</th>
                    <th>Update Date</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($updates as $update)
                <tr>
                <td><img src = "{{ $update->cover_url }}" alt="{{ $update->manga_name }}'s cover" width="60px"></td>                                        
                <td><a href="{{ url("manga-$update->manga_id") }}">{{ $update->manga_name }}</a></td>
                <td><a href="{{ url("chapter-$update->id") }}">{{ $update->name }}</a></td>
                <td>{{ $update->updated_at }}</td>
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