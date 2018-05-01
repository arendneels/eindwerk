@extends('layouts.front')

@section('content')
    <h1 class="d-none">SEARCH</h1>
    <div class="text-grey2"><a href="{{ route('index') }}" class="text-grey2">HOME</a> / <a href="#" class="text-grey2">SEARCH RESULTS</a></div>
    <!--SEARCH RESULTS!-->
    <section class="mb-5 mb-lg-7">
        <h2 class="text-center pt-3 pt-lg-4">SEARCH RESULTS FOR : <span class="fw-200 text-uppercase">{{ Request::get('term') }}</span></h2>
        <p class="text-center pb-2 text-grey2"><i>{{ $count }}&nbsp;Items</i></p>
        @if($count > 0)
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="itemcard mx-auto">
                            <a href="{{ route('productdetail', $product->id) }}" class="">
                                <img class="catImg img-fluid" src="{{ $product->thumbnail_path() }}" alt="">
                                <div class="text-center font-size-footer">
                                    <p class="text-uppercase"><strong>{{ $product->name }}</strong></p>
                                    <p>&euro;{{ $product->price }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-grey2"><em>There are no results for your search.</em></p>
        @endif
        {{ $products->links('layouts.pagination') }}
    </section>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection