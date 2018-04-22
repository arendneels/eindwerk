@extends('layouts.back')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    &nbsp;
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Country</th>
                            <th id="controls" style="width:150px;">Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->country->name }}</td>
                                <td class="row">
                                    <div class="col-sm-6">
                                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                    </div>
                                    <!-- Form -->
                                {!! Form::open(['method' => 'DELETE', 'action' => ['back\UserController@destroy', $user->id], 'class' => 'col-sm-6']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
                                {!! Form::close() !!}
                                <!-- /Form -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('scripts')
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });

        //Make controls column smaller
        $('#dataTables-example').on( 'column-sizing.dt', function ( e, settings ) {
            $('#controls').css('width',150);
        } );

        //Prevent controls column to have sorting options
        /*
        $('#dataTables-example').on( 'order.dt', function () {
            // This will show: "Ordering on column 1 (asc)", for example
            $('#controls').removeClass('sorting');
        });
        */

        //Delete button alert
        $('.delete').click(function(){
            return confirm("Are you sure you want to delete this?")
        });
    </script>
@endsection