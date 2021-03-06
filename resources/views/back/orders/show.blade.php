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
                    <div class="row" style="margin-bottom:8px;">
                        <div class="col-lg-6">
                            <strong>Client Info</strong>
                            <ul class="list-unstyled">
                                <li><em>Name: </em>{{ $order->first_name . ' ' . $order->last_name }}</li>
                                <li><em>Email: </em>{{ $order->email }}</li>
                                <li><em>Shipping Address:</em>
                                    <ul style="list-style:none;">
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
                                <li><em>Order ID: </em>{{ $order->id }}</li>
                                <li><em>Order date: </em>{{ $order->created_at }}</li>
                                @if($order->shipping_date)
                                    <li><em>Shipping date: </em>{{ $order->shipping_date }}</li>
                                @endif
                                <li><em>Payment Method: </em>{{ $order->payment_method }}</li>
                                <li><em>Payment ID: </em>{{ $order->payment_id }}</li>
                                <li><em>Status: </em>{{ $order->status }}</li>
                                <li><em>Subtotal: </em>{{ $order->subtotal }}</li>
                                <li><em>Total: </em>{{ $order->total }}</li>
                            </ul>
                        </div>
                    </div>

                    <strong>Products ordered</strong>
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
                    <div style="float:right">
                        @if($order->status == 'PAID')
                            <form action="{{ route('orders.ready', $order) }}" method="post" style="margin-bottom: 8px;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put" />
                                <button type="submit" class="btn btn-success">Ready for delivery&nbsp;<i class="fa fa-check"></i></button>
                            </form>
                        @endif
                        @if($order->status == 'READY FOR DELIVERY')
                            <form action="{{ route('orders.delivered', $order) }}" method="post" style="margin-bottom: 8px;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put" />
                                <button type="submit" class="btn btn-success">Delivered!&nbsp;<i class="fa fa-check"></i></button>
                            </form>
                        @endif

                        @if($order->status <> 'CANCELLED')
                            <form action="{{ route('orders.destroy', $order) }}" method="post" style="float:right">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete" />
                                <button type="submit" class="btn btn-danger">Cancel&nbsp;<i class="fa fa-remove"></i></button>
                            </form>
                            @endif
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection