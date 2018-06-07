@extends('layouts.front')

@section('content')
    <h1 class="d-none">CONTACE</h1>
    <div class="text-grey2"><a href="{{ route('index') }}" class="text-grey2">HOME</a> / <a href="#" class="text-grey2">SUCCESSFUL CONTACT</a></div>
    <!--SEARCH RESULTS!-->
    <section class="mb-5 mb-lg-7">
        <h2 class="text-center pt-3 pt-lg-4">Message sent successfully</h2>
        <p class="text-center text-grey2">
            Thank you for your feedback, we will contact you back as soon as possible.
    </section>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection