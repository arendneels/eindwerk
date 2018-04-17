@extends('layouts.back')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <!-- Form -->
                            {!! Form::model($product, ['method' => 'PATCH', 'action' => ['back\ProductController@update', $product->id]]) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Product Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('article_no', 'Article No.') !!}
                                {!! Form::text('article_no', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::number('price',null,['class' => 'form-control','step'=>'0.01']) !!}
                            </div>

                            @foreach($product->colors as $key => $color)
                            <div class="form-group">
                                @if($key == 0)
                                    {!! Form::label('color_id1', 'Color(s)') !!}
                                @endif
                                {!! Form::select('color_id' .($key+1), $colorsSelect, $color->id,['class' => 'form-control']) !!}
                            </div>
                            @endforeach

                            <div class="form-group">
                                {!! Form::submit('Edit Product', ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        <!-- /Form -->

                            <!-- Errors -->
                            @if($errors->all())
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        @endif
                        <!-- /Errors -->

                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection