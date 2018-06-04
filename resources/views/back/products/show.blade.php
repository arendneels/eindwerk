@extends('layouts.back')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product statistics</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $product->name }}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row" style="margin-bottom:8px;">
                        <div class="col-lg-6">
                            <strong>Product Info</strong>
                            <ul class="list-unstyled">
                                <li><em>Name: </em>{{ $product->name }}</li>
                                <li><em>Article No.: </em>{{ $product->article_no }}</li>
                                <li><em>Price: </em>&euro;&nbsp;{{ $product->price }}</li>
                                <li><em>Categories:</em>
                                    <ul style="list-style:none;">
                                        @foreach($product->categories as $category)
                                            <li>{{ $category->name }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><em>Colors:</em>
                                    <ul style="list-style:none;">
                                        @foreach($product->colors as $color)
                                            <li>{{ $color->name }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <strong>Available Sizes</strong>
                            <ul>
                                @foreach($product->stocks as $stock)
                                    <li>{{ $stock->size->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <strong>Statistics</strong>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Amount sold per size (Last 7 Months)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div>
                                {!! $chartjs->render() !!}
                            </div>
                        </div>
                        <!-- /.panel-body -->
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
    <script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
@endsection