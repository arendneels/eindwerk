@extends('layouts.front')

@section('content')
    <h1 class="text-center pb-lg-5 pb-4 pt-3 pt-lg-5 text-black">EDIT YOUR ACCOUNT</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--EDIT ACCOUNT FORM!-->
    <form action="{{ route('editaccount') }}" method="post">
        {{ csrf_field() }}
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="first-name">FIRST NAME</label>
                <input name="first_name" class="form-control" type="text" id="first-name" value="{{ $user->first_name }}">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="last-name">LAST NAME</label>
                <input name="last_name" class="form-control" type="text" id="last-name" value="{{ $user->last_name }}">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="address1">ADDRESS (line 1)</label>
                <input name="address" class="form-control" type="text" id="address1" value="{{ $user->address }}">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="address2">ADDRESS (line 2)</label>
                <input name="address2" class="form-control" type="text" id="address2" value="{{ $user->address2 }}">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="city">CITY</label>
                <input name="city" class="form-control" type="text" id="city" value="{{ $user->city }}">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="postal-code">POSTAL CODE</label>
                <input name="postal_code" class="form-control" type="text" id="postal-code" value="{{ $user->postal_code }}">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                {!! Form::label('country_id', 'COUNTRY') !!}
                {!! Form::select('country_id', $countriesSelect, $user->country->id, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="phone">PHONE NUMBER</label>
                <input name="phone" class="form-control" type="text" id="phone" value="{{ $user->phone }}">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="email">E-MAIL</label>
                <input name="email" class="form-control" type="email" id="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="password">NEW PASSWORD</label>
                <input name="password" class="form-control" type="password" id="password">
                <small id="passwordHelp" class="form-text text-muted">Leave field empty if you want to make changes but keep your old password.</small>
            </div>
        </div>
        <div class="form-check text-center">
            <input type="checkbox" class="form-check-input" id="checkbox-billing">
            <label class="form-check-label" for="checkbox-billing">Use this address for Billing</label>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-orange text-white px-5 py-2">SAVE</button>
        </div>
    </form>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection