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
            <h2 class="pull-left">Sports Details</h2>
        </div>



        <?php
            $row = [
                'id' => '1',
                'category' => 'abc',
                'name' => 'loc',
            ];
            if(true) {
                echo "<table class='table table-bordered table-striped'>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>#</th>";                                        
                            echo "<th>Sports Category</th>";
                            echo "<th>Sports Name</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    for ($i = 0; $i < 3; $i++) {
                        echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";                                        
                            echo "<td>" . $row['category'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>";
                            echo "<a href='index.php?act=update&id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><i class='fa fa-edit'></i></a>";
                            echo "  ";
                            echo "<a href='index.php?act=delete&id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><i class='fa fa-trash'></i></a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";                            
                echo "</table>";
            } else{
                echo "<p class='lead'><em>No records were found.</em></p>";
            }
        ?>
    </div>
</div> 
@endsection