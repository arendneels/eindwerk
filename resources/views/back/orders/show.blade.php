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
                    {{ 'Payment ID: ' . $order->payment_id }}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <strong>Client Info</strong>
                            <ul class="list-unstyled">
                                <li>Name: {{ $client->first_name . ' ' . $client->last_name }}</li>
                                <li>Email: {{ $client->email }}</li>
                                <li><em>Shipping Address:</em>
                                    <ul class="list-unstyled">
                                        <li>{{ $order->address }}</li>
                                        @if($order->address2)
                                            <li>{{ $order->address2 }}</li>
                                        @endif
                                        <li>{{ $order->postal_code . ' ' . $order->city }}</li>
                                        <li>{{ $order->country->name }}</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <strong>Order Info</strong>
                            <ul class="list-unstyled">
                                <li>Payment Method: {{ $order->payment_method }}</li>
                                <li>Payment ID: {{ $order->payment_id }}</li>
                                <li>Status: {{ $order->status }}</li>
                                <li>Subtotal: {{ $order->subtotal }}</li>
                                <li>Total: {{ $order->total }}</li>
                            </ul>
                        </div>
                    </div>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->stocks()->with('product', 'size')->get() as $stock)
                            <tr>
                                <td>{{ $stock->product->name }}</td>
                                <td>{{ $stock->size->name }}</td>
                                <td>{{ $stock->pivot->price }}</td>
                                <td>{{ $stock->pivot->amt }}</td>
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