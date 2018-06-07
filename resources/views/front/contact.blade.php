@extends('layouts.front')

@section('content')
    <div class="text-grey2"><a href="{{ route('index') }}" class="text-grey2">HOME</a> / <a href="#" class="text-grey2">CONTACT</a></div>
    <h1 class="text-center text-black">CONTACT</h1>
    <p class="text-center pb-2"><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</i></p>
    <!--CONTACT FORM!-->
    <form action="{{ route('contact.add') }}" method="post">
        {{ csrf_field() }}
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="topic">TOPIC</label>
                <input name="topic" id="topic" class="form-control" type="text">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="name">NAME</label>
                <input name="name" class="form-control" type="text" id="name">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="email">E-MAIL</label>
                <input name="email" class="form-control" type="email" id="email">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="body">MESSAGE</label>
                <textarea name="body" class="form-control" id="body" style="height:300px;"></textarea>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-orange text-white px-5 py-2">SEND</button>
        </div>
    </form>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>You may also like</em></p>
@endsection