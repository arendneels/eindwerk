@extends('layouts.back')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orders</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All orders
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th id="sort">Order date</th>
                            <th>User</th>
                            <th>Payment Method</th>
                            <th>Payment ID</th>
                            <th>Country</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->first_name . ' ' . $order->last_name }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->payment_id }}</td>
                                <td>{{ $order->country->name }}</td>
                                <td>{{ '€ ' . $order->total }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('orders.show', $order->id) }}">Details</a>
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

            //Sort by id="sort" default
            $('#sort').click();
        });
    </script>
@endsection