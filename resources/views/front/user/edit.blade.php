@extends('layouts.front')

@section('content')
    <div class="text-grey2"><a href="#" class="text-grey2">HOME</a> / <a href="#" class="text-grey2">ACCOUNT</a> / <a href="#" class="text-grey2">EDIT YOUR ACCOUNT</a></div>
    <h1 class="text-center pb-lg-5 pb-4 pt-3 pt-lg-5 text-black">EDIT YOUR ACCOUNT</h1>
    <!--EDIT ACCOUNT FORM!-->
    <form action="#" method="post">
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="first-name">FIRST NAME</label>
                <input class="form-control" type="text" id="first-name">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="last-name">LAST NAME</label>
                <input class="form-control" type="text" id="last-name">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="address1">ADDRESS (line 1)</label>
                <input class="form-control" type="text" id="address1">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="address2">ADDRESS (line 2)</label>
                <input class="form-control" type="text" id="address2">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="city">CITY</label>
                <input class="form-control" type="text" id="city">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="postal-code">POSTAL CODE</label>
                <input class="form-control" type="text" id="postal-code">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="delivery-method">COUNTRY</label>
                <select id="delivery-method" class="form-control form-control-sm" name="delivery-method">
                    <option value="1">Poland</option>
                    <option value="2">Belgium</option>
                </select>
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="phone">PHONE NUMBER</label>
                <input class="form-control" type="text" id="phone">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="email">E-MAIL</label>
                <input class="form-control" type="email" id="email">
            </div>
        </div>
        <div class="form-check text-center">
            <input type="checkbox" class="form-check-input" id="checkbox-billing">
            <label class="form-check-label" for="checkbox-billing">Use this address for Billing</label>
        </div>
        <div class="row justify-content-center">
            <a href="#" class="btn btn-orange text-white px-5 py-2">SAVE</a>
        </div>
    </form>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection