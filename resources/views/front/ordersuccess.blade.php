@extends('layouts.front')

@section('content')
    <h1 class="d-none">ORDER</h1>
    <div class="text-grey2"><a href="{{ route('index') }}" class="text-grey2">HOME</a> / <a href="#" class="text-grey2">SUCCESSFUL ORDER</a></div>
    <!--SEARCH RESULTS!-->
    <section class="mb-5 mb-lg-7">
        <h2 class="text-center pt-3 pt-lg-4">Order successful</h2>
            <p class="text-center text-grey2">
                Thank you for placing your order, we will make sure the goods are delivered as quickly as possible.
                <br>
                <br>
                    @if(Auth()->user())
                    Click <a href="{{ route('history') }}" class="text-orange">here</a> to view your order history.</p>
        @else
            Click <a href="{{ route('index') }}" class="text-orange">here</a> to return to our homepage.</p>
        @endif
    </section>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection