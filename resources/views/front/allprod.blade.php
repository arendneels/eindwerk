@extends('layouts.front')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-slider.min.css') }}">
@endsection

@section('content')
    <h1 class='d-none'>CATEGORIES</h1>
    <div class="text-grey2 text-uppercase">
        <a href="{{ route('index') }}" class="text-grey2">Home</a>
        <span>/</span>
        <a href="{{ route('categories', $category1->id) }}" class="text-grey2">{{ $category1->name }}</a>
        <span>/</span>
        <a href="#" class="text-grey2">{{ $category2->name or "All" }}</a>
    </div>
    <section class="mb-5 mb-lg-5">
        <h2 class="text-center text-uppercase">
            {{ $category1->name }}
        </h2>
        <p class="text-center pb-2 text-grey2"><i>{{ $category2->name or "All products" }}</i></p>
        <!--SEARCH FILTER!-->
        <form action="#" method="get">
            <div class="row justify-content-center pb-4 pb-lg-5">
                <div class=" col-md-3 col-sm-4 col-12 my-2 my-sm-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            &euro;<span id="price_min"></span>
                        </div>
                        <div>
                            &euro;<span id="price_max"></span>
                        </div>
                    </div>
                    <input name="price" type="text" class="slider" class="span2" value="" data-slider-min="0" data-slider-max="500" data-slider-step="5" data-slider-value="{{ $price_range or '[0,500]' }}" style="width:100%"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-12 my-2 my-sm-0">
                        {!! Form::select('color_id', ['' => 'All Colors'] + $colorsSelect, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-12 my-2 my-sm-0">
                    {!! Form::select('size_id', ['' => 'All Sizes'] + $sizesSelect, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-lg-2 col-12 my-2 my-lg-0 text-lg-left text-center">
                    <button class="btn btn-orange text-white">FILTER</button>
                </div>
            </div>
        </form>
        <!--ALL MEN RESULTS SPECIFIED BY FILTER!-->
        <div class="row">
            @foreach($allProducts as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="itemcard mx-auto text-center">
                    <a href="{{ route('productdetail', $product->id) }}" class="">
                        <div class="imgheightsm w-100 row justify-content-center">
                            <img class="col-auto align-self-center" src="{{ asset($product->thumbnail_path()) }}" alt="" style="max-width:100%; max-height:100%">
                        </div>
                        <div class="font-size-footer">
                            <p class="text-uppercase"><strong>{{ $product->name }}</strong></p>
                            <p>&euro;{{ $product->price }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $allProducts->links('layouts.pagination') }}
    </section>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap-slider.min.js') }}"></script>
    <script>
        $(function() {
            var mySlider = $("input.slider").slider();

            var value = mySlider.val().split(',');
            $('#price_min').html(value[0]);
            $('#price_max').html(value[1]);

            mySlider.change(function() {
                var value = mySlider.val().split(',');
                $('#price_min').html(value[0]);
                $('#price_max').html(value[1]);
            });
        });
    </script>
@endsection