@extends('layouts.back')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Stock</h1>
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
                            <th>Name</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{ $stock->product->article_no }}</td>
                                <td>{{ $stock->product->name }}</td>
                                <td>{{ $stock->size->name }}</td>
                                <td>{{ '€ ' . $stock->product->price }}</td>
                                <td>{{ $stock->amount }}</td>
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