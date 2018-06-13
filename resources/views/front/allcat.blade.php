@extends('layouts.front')

@section('content')
    <h1 class='d-none'>Categories</h1>
    <div class="text-grey2 text-uppercase">
        <a href="{{ route('index') }}" class="text-grey2">Home</a>
        <span>/</span>
        <a href="#" class="text-grey2">{{ $mainCategory->name }}</a>
    </div>
    @foreach($categories as $category)
    <section class="mb-5 mb-lg-7">
        <h2 class="text-center text-uppercase">{{ $category->name }}</h2>
        <div class="text-center pb-4"><a href="{{ route('products', [$mainCategory->id, $category->id]) }}" class="text-grey2"><em class="underline">show more</em>&nbsp;<span class="fas fa-caret-right"></span></a></div>
        <div class="row">
            @foreach($category->products()->with('photos')->whereIn('products.id', $productIds)->limit(4)->get() as $product)
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
    </section>
    @endforeach
    {{ $categories->links('layouts.pagination') }}
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection