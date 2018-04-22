@extends('layouts.back')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Category</h1>
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
                            {!! Form::open(['method' => 'POST', 'action' => ['back\CategoryController@store']]) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Category Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Create Category', ['class' => 'btn btn-success']) !!}
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