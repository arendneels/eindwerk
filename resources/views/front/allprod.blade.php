@extends('layouts.front')

@section('content')
    <h1 class='d-none'>CATEGORIES</h1>
    <div class="text-grey2"><a href="#" class="text-grey2">HOME</a> / <a href="#" class="text-grey2">MEN</a></div>
    <section class="mb-5 mb-lg-5">
        <h2 class="text-center">
            {{ $category1->name }}
            {{ isset($category2) ? "/ " . $category2->name : "" }}
        </h2>
        <p class="text-center pb-2 text-grey2"><i>All products</i></p>
        <!--SEARCH FILTER!-->
        <div class="row justify-content-center pb-4 pb-lg-5">
            <div class="col-lg-2 col-md-3 col-sm-4 col-12 my-2 my-sm-0">
                <select name="price" id="price" class="form-control">
                    <option value="1">&euro; 20-30</option>
                    <option value="1">&euro; 30-50</option>
                    <option value="1">&euro; 50-100</option>
                    <option value="1">&euro; 100 and more</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-12 my-2 my-sm-0">
                <select name="color" id="color" class="form-control">
                    <option value="1">Black</option>
                    <option value="1">White</option>
                    <option value="1">Blue</option>
                    <option value="1">Red</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-12 my-2 my-sm-0">
                <select name="size" id="size" class="form-control">
                    <option value="1">Small</option>
                    <option value="1">Medium</option>
                    <option value="1">Large</option>
                    <option value="1">Extra large</option>
                </select>
            </div>
        </div>
        <!--ALL MEN RESULTS SPECIFIED BY FILTER!-->
        <div class="row">
            @foreach($allProducts as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="itemcard mx-auto text-center">
                    <a href="{{ route('productdetail', $product->id) }}" class="">
                        <img class="catImg img-fluid" src="{{ $product->thumbnail_path() }}" alt="">
                        <div class="font-size-footer">
                            <p><strong>{{ $product->name }}</strong></p>
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