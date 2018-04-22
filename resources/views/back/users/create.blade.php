@extends('layouts.back')

@section('styles')
    <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User info
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
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
                    <div class="row">
                        <!-- Form -->
                        {!! Form::open(['method' => 'POST', 'action' => ['back\UserController@store']]) !!}
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('first_name', 'First Name') !!}
                                {!! Form::text('first_name', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('last_name', 'Last name') !!}
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'E-mail') !!}
                                {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', 'Phone Number') !!}
                                {!! Form::text('phone', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <p><strong>Roles&nbsp;</strong></p>
                                <div id="sizes" class="col-lg-8" style="margin-bottom:16px;border:1px solid #ccc; border-radius:5px; padding-top:5px;">
                                    @foreach($allRoles as $role)
                                        <span style="margin-right:10px;">
                                            <input class="rolesInput" name="roles[]" type="checkbox" value="{{ $role->id }}" {{ $role->id == 1 ? "checked" : "" }}><label>{{ $role->name }}</label>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('country', 'Country') !!}
                                {!! Form::select('country_id', $countriesSelect, null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('postal_code', 'Postal Code') !!}
                                {!! Form::text('postal_code', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('city', 'City') !!}
                                {!! Form::text('city', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('address', 'Address') !!}
                                {!! Form::text('address', null,['class' => 'form-control', 'required']) !!}
                                {!! Form::text('address2', null,['class' => 'form-control' ,'style' => 'margin-top:8px;']) !!}
                            </div>
                            <div class="form-group text-right">
                                {!! Form::submit('Create User', ['class' => 'btn btn-success']) !!}
                            </div>
                        {!! Form::close() !!}
                        <!-- /Form -->
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

@section('scripts')

@endsection