@extends('layouts.front')

@section('content')
    <div class="text-grey2"><a href="{{ route('index') }}" class="text-grey2">HOME</a> / <a href="#" class="text-grey2">ABOUT</a></div>
    <h1 class="text-center">ABOUT</h1>
    <p class="text-center pb-2 text-grey2"><i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</i></p>
    <img id="img-about" src="{{ asset('images/about.jpg') }}" alt="" style="max-height:500px;">
    <div class="row py-5 py-lg-6 font-size2">
        <!--WHO ARE WE ARTICLE!-->
        <article class="col-lg-6">
            <h2>WHO WE ARE?</h2>
            <div class="text-grey2">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit laboriosam architecto blanditiis. Optio atque deserunt repellendus rerum tenetur aspernatur placeat, omnis labore perferendis magnam vero id, aliquam laboriosam doloribus illum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum blanditiis unde architecto earum assumenda totam deserunt porro omnis, nesciunt iure, recusandae eius ut! Facere, id quibusdam saepe natus officiis animi!</p>
            </div>
        </article>
        <!--WHAT DO WE DO ARTICLE!-->
        <article class="col-lg-6">
            <h2>WHAT DO WE DO?</h2>
            <div class="text-grey2">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit laboriosam architecto blanditiis. Optio atque deserunt repellendus rerum tenetur aspernatur placeat, omnis labore perferendis magnam vero id, aliquam laboriosam doloribus illum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum blanditiis unde architecto earum assumenda totam deserunt porro omnis, nesciunt iure, recusandae eius ut! Facere, id quibusdam saepe natus officiis animi!</p>
            </div>
        </article>
    </div>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>You may also like</em></p>
@endsection