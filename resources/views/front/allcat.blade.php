@extends('layouts.front')

@section('content')
    <h1 class='d-none'>Categories</h1>
    <div class="text-grey2"><a href="{{ route('index') }}" class="text-grey2">HOME</a> / <a href="{{ route('products', $mainCategory->id) }}" class="text-grey2">{{ $mainCategory->name }}</a></div>
    @foreach($categories as $category)
    <section class="mb-5 mb-lg-7">
        <h2 class="text-center">{{ $category->name }}</h2>
        <div class="text-center pb-4"><a href="{{ route('products', [$mainCategory->id, $category->id]) }}" class="text-grey2"><em class="underline">show more</em>&nbsp;<span class="fas fa-caret-right"></span></a></div>
        <div class="row">
            @foreach($category->products()->whereIn('products.id', $productIds)->limit(4)->get() as $product)
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
    </section>
    @endforeach
    {{ $categories->links('layouts.pagination') }}
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection