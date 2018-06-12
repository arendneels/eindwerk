@extends('layouts.front')

@section('content')
    <h1 class="text-center font-size-header animated fadeIn mt-7">HAZY SHADE OF SPRING</h1>
    <p class="text-center font-size-subheader pb-5 text-grey2 animated fadeIn"><em>Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo.</em></p>
    <div class="text-center p-3 p-md-4 animated fadeIn"><a href="#newArrivals" class="border p-4">CHECK NEW ARRIVALS</a></div>
    <!--IMAGEBOARD!-->
    <div id="newArrivals" class="py-6 py-md-7">
        <div class="row no-gutters">
            @foreach($newArrivals as $product)
                <div class="col-md-3 bg-test d-flex flex-column">
                    <a href="{{ route('productdetail', $product) }}"><img src="{{ asset($product->thumbnail_path()) }}" class="imgheightsm w-100" alt=""></a>
                </div>
            @endforeach
        </div>
    </div>
    <!--EMAIL SIGN UP!-->
    <form action="{{ route('addsubscriber') }}" method="post" class="text-center py-5">
        {{ csrf_field() }}
        <h2>SIGN UP TO RECEIVE OUR UPDATES</h2>
        <em class="text-grey2">Nulla ipsum dolor lacus, suscipit adipiscing. Cum sociis natoque penatibus et ultrices volutpat.</em>
        <div class="row justify-content-center py-4">
            <div class="col-12 col-md-9 col-lg-6">
                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Your e-mail" aria-label="Your e-mail" required>
                    <div class="input-group-append">
                        <button class="btn btn-orange text-white" type="submit">Add</button>
                    </div>
                </div>
                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection