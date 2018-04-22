@extends('layouts.back')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Stock</h1>
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
                            <th id="controls" style="width:150px;">Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{ $stock->product->article_no }}</td>
                                <td>{{ $stock->product->name }}</td>
                                <td>{{ $stock->size->name }}</td>
                                <td>{{ '€ ' . $stock->product->price }}</td>
                                <td id="amount_{{ $stock->id }}"><a href="{{ route('stocks.show', $stock->id) }}">{{ $stock->amount }}</a><span class="text-success" style="opacity:0"> Stock successfully added</span></td>
                                <td>
                                    <form class="addForm" method="post" action="#">
                                        {{ csrf_field() }}
                                        <input type="number" class="hidden addId" value="{{ $stock->id }}">
                                        <input class="addInput form-control" type="number" name="add" style="width:80px; margin-right:8px;">
                                        <input type="submit" class="btn btn-success" value="Add">
                                    </form>
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
            $('#controls').css('width',120);
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

        //Add buttons
        $('.addForm').submit(function(e){
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url:'/admin/stocks/' + form.children('.addId').val(),
                type:'patch',
                data:form.serialize(),
                success:function(response){
                    $('#amount_' + response['id']).children('a').html(response['amount']);
                    form.children('.addInput').val(null).blur();
                    var successMsg = $('#amount_' + response['id']).children('span');
                    successMsg.css('opacity', 1);
                    setTimeout(function(){
                        successMsg.animate({opacity: "0"}, 500)
                    }, 1000);
                }
            });
        });
    </script>
@endsection