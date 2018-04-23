@extends('layouts.front')

@section('content')
    <div class="text-grey2"><a href="index.html" class="text-grey2">HOME</a> / <a href="about.html" class="text-grey2">ABOUT</a></div>
    <h1 class="text-center">ABOUT</h1>
    <p class="text-center pb-2 text-grey2"><i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</i></p>
    <img id="img-about" src="http://via.placeholder.com/350x150" alt="">
    <div class="row py-5 py-lg-6 font-size2">
        <!--WHO ARE WE ARTICLE!-->
        <article class="col-lg-6">
            <h2>WHO WE ARE?</h2>
            <div class="text-grey2">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit laboriosam architecto blanditiis. Optio atque deserunt repellendus rerum tenetur aspernatur placeat, omnis labore perferendis magnam vero id, aliquam laboriosam doloribus illum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum blanditiis unde architecto earum assumenda totam deserunt porro omnis, nesciunt iure, recusandae eius ut! Facere, id quibusdam saepe natus officiis animi!</p>
            </div>
        </article>
        <!--WHAT WE ARE DOING ARTICLE!-->
        <article class="col-lg-6">
            <h2>WHAT WE ARE DOING?</h2>
            <div class="text-grey2">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit laboriosam architecto blanditiis. Optio atque deserunt repellendus rerum tenetur aspernatur placeat, omnis labore perferendis magnam vero id, aliquam laboriosam doloribus illum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum blanditiis unde architecto earum assumenda totam deserunt porro omnis, nesciunt iure, recusandae eius ut! Facere, id quibusdam saepe natus officiis animi!</p>
            </div>
        </article>
    </div>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>You may also like</em></p>
@endsection