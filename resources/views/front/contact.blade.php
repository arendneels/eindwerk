@extends('layouts.front')

@section('content')
    <div class="text-grey2"><a href="#" class="text-grey2">HOME</a> / <a href="#" class="text-grey2">CONTACT</a></div>
    <h1 class="text-center text-black">CONTACT</h1>
    <p class="text-center pb-2"><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</i></p>
    <!--CONTACT FORM!-->
    <form action="#" method="post">
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="delivery-method">TOPIC</label>
                <select id="delivery-method" class="form-control form-control-sm" name="delivery-method">
                    <option value="1">Lorem Ipsum</option>
                    <option value="2">Lorem Ipsum 2</option>
                </select>
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="first-name">NAME</label>
                <input class="form-control" type="text" id="first-name">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="last-name">E-MAIL</label>
                <input class="form-control" type="text" id="last-name">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="address1">MESSAGE</label>
                <textarea class="form-control" id="address1" style="height:300px;"></textarea>
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="#" class="btn btn-orange text-white px-5 py-2">SEND</a>
        </div>
    </form>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>You may also like</em></p>
@endsection