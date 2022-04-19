@extends('layouts.master')

@section('asset')
    @parent
@endsection

@section('title', 'Update')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header clearfix">
            <br><br>
            <h2 class="pull-left">Update list</h2>
        </div>

        @php
            $row = [
                'cover' => 'dist/img/one_piece.jpg',
                'name' => 'One Piece',
                'chapter' => '1',
                'update-date' => '4/19/2022',
            ];
        @endphp

        @if (true)
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
            @for ($i = 0; $i < 3; $i++) 
                <tr>
                <td><img src = "{{ $row['cover'] }}" alt="{{ $row['name'] }}'s cover" width="60px"></td>                                        
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['chapter'] }}</td>
                <td>{{ $row['update-date'] }}</td>
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