@extends('layouts.back')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $stock->product->name }}<span class="h4">&nbsp;(Size: {{ $stock->size->name }})</span></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Stocklog
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>By</th>
                                <th>Amount</th>
                                <th>New Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stocklogs as $stocklog)
                                <tr>
                                    <td>{{ $stocklog->created_at }}</td>
                                    <td>
                                        <strong>{{ $stocklog->type }}</strong>
                                        @if($stocklog->type == 'Order')
                                            (<a href="{{ route('orders.show', $stocklog->order_id) }}">Details</a>)
                                        @endif
                                    </td>
                                    <td>{{ $stocklog->user->first_name }}</td>
                                    <td>{{ $stocklog->add }}</td>
                                    <td>{{ $stocklog->amount }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('scripts')
@endsection