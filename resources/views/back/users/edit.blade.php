@extends('layouts.back')

@section('styles')
    <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit User</h1>
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
                        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['back\UserController@update', $user->id]]) !!}
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('first_name', 'First Name') !!}
                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('last_name', 'Last name') !!}
                                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('address', 'Address') !!}
                                {!! Form::text('address', null,['class' => 'form-control']) !!}
                                {!! Form::text('address_2', null,['class' => 'form-control' ,'style' => 'margin-top:8px;']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('city', 'City') !!}
                                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('postal_code', 'Postal Code') !!}
                                {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('country', 'Country') !!}
                                {!! Form::select('country_id', $countriesSelect, $user->country->id, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', 'Phone Number') !!}
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'E-Mail') !!}
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="divRole">
                                {!! Form::number('roles_amt', $user->roles->count(),['id' => 'users_amt', 'class' => 'hidden']) !!}
                                @foreach($user->roles as $key => $role)
                                    <div class="form-group">
                                        @if($key == 0)
                                            {!! Form::label('role_id1', 'Role(s)') !!}
                                        @endif
                                        {!! Form::select('role_id' .($key+1), $allRoles, $role->id,['id' => 'role_id' . ($key+1), 'class' => 'form-control', 'onclick' => 'setRoles()']) !!}
                                    </div>
                                @endforeach
                            </div>
                            <a href="#" onclick="event.preventDefault(); addRole('divRole')">Add Role</a>
                            &nbsp;
                            <a href="#" onclick="event.preventDefault(); removeCategory()">Remove Role</a>

                            <div id="image_info">
                                <input id="imageCounter" name="images_amt" type="number" class="hidden" value="0">
                            </div>
                            <div class="form-group text-right">
                                {!! Form::submit('Edit Product', ['class' => 'btn btn-primary']) !!}
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