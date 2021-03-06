@extends('layouts.back')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Forms</h1>
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
                            {!! Form::model($category, ['method' => 'PUT', 'action' => ['back\CategoryController@update', $category->id]]) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Category Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Edit Category', ['class' => 'btn btn-primary']) !!}
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