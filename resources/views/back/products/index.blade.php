@extends('layouts.back')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
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
                            <th>Article No.</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th id="controls">Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->article_no }}</td>
                                <td class="text-center"><img src="{{ asset($product->thumbnail_path()) }}" alt="" style="height:50px;"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ '€ ' . $product->price }}</td>
                                <td class="row">
                                    <a class="btn btn-primary col-sm-6" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                    <!-- Form -->
                                {!! Form::open(['method' => 'DELETE', 'action' => ['back\ProductController@destroy', $product->id], 'class' => 'col-sm-6']) !!}
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
            $('#controls').css('width',80);
        } );

        //Prevent controls column to have sorting options
        $('#dataTables-example').on( 'order.dt', function () {
            // This will show: "Ordering on column 1 (asc)", for example
            $('#controls').removeClass('sorting');
            console.log('OK');
        } );

        //Delete button alert
        $('.delete').click(function(){
            return confirm("Are you sure you want to delete this?")
        });
    </script>
@endsection