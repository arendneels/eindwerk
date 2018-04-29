@extends('layouts.front')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
@endsection

@section('content')
    <div class="text-grey2"><a href="index.html" class="text-grey2">HOME</a> / <a href="men.html" class="text-grey2">MEN</a> / <a href="#" class="text-grey2">SHOES</a> / <a href="detail.html" class="text-grey2">FLORAL PLIMSOLL</a></div>
    <div class="row position-relative no-gutters pt-2 pt-md-3">
        <!--DETAIL IMAGE!-->
        <div id="img-holder" class="col-12">
            @if($product->photos->count() <> 0 )
            @foreach($product->photos as $key=>$photo)
            <a href="{{ $photo->path() }}" data-lightbox="product_details" data-title="{{ $product->name }}">
                <img id="img_det_{{ $key+1 }}" src="{{ $photo->path() }}" class="img-det center {{ $key==0?"show": "" }}" {{$key==0 ? 'target=show' : 'style=display:none;'}} alt="">
            </a>
            @endforeach
            @else
                <img class="img-det center show" src="{{ asset('images/no-image.jpg') }}" alt="">
            @endif
        </div>

        @if($product->photos->count() <> 0)
        <!--BOX WITH THUMBNAILS!-->
        <div id="img-small-box" class="position-absolute col-2 col-lg-1 pt-2 d-flex flex-column align-items-center px-1 px-sm-2">
            @foreach($product->photos as $key=>$photo)
                <img id="img_thumb_{{ $key+1 }}" src="{{ $photo->path() }}" class="mb-2 img-detail-thumb border border-grey {{ $key==0? ' border-grey2' : '' }}" {{ $key==0? 'target=highlight' : '' }} alt="">
            @endforeach
        </div>
            @endif
    </div>
    <!--DETAIL DATA!-->
    <h1 class="text-center py-3 py-lg-5 fs-21">{{ $product->name }}</h1>
    <p class="text-center pb-2 fs-7"><em>Ref:&nbsp;{{ $product->article_no }}</em></p>
    <p class="text-center pb-2 fs-11"><em>&euro;&nbsp;{{ $product->price }}</em></p>
    <div class="row justify-content-center">
        <div class="text-center col-12 col-lg-7">
            <p>{{ $product->description }}</p>
        </div>
    </div>
    <!--SIZES!-->
    <p class="text-center mb-0 font-size4">
        <strong>SIZE</strong>
        @if($product->sizeUnits())
            <br>
            <span class="fs-8">{{ $product->sizeUnits() }}</span>
        @endif
    </p>
    <div class="row justify-content-center py-3">
        @foreach($product->stocks as $stock)
            @if($stock->amount <= 0)
                <button class="btn btn-size mx-1 text-grey2 sizeBtn" value="{{ $stock->id }}" disabled>{{ $stock->size->name }}*</button>
            @else
                <button class="btn btn-size mx-1 text-grey2 sizeBtn" value="{{ $stock->id }}">{{ $stock->size->name }}</button>
            @endif
        @endforeach
    </div>
    @if($hasSizesOutOfStock)
        <p class="text-center fs-7 text-grey2">*&nbsp;Currently out of stock</p>
    @endif
    <div id="errorMsg" class="row justify-content-center d-none">
        <div class="col-auto alert alert-danger text-center">
            Please choose a size
        </div>
    </div>
    <div class="row justify-content-center">
        <form id="addForm" action="">
            <button id="addButton" type="submit" class="btn btn-orange text-white px-5 py-2">ADD TO CART</button>
        </form>
    </div>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0">Check our lookbook</p>
@endsection

@section('scripts')
    <script src="{{ asset('js/lightbox.min.js') }}"></script>
    <script>
        $('#addButton').click(function(e){
            if($('#addForm').attr('action') == "") {
                e.preventDefault();
                $('#errorMsg').removeClass('d-none');
            }
        })

        $('.sizeBtn').click(function(){
            $('.sizeBtn').removeClass('bg-success');
            $('#errorMsg').addClass('d-none');
            $(this).addClass('bg-success');
            var stock_id = $(this).val();
            $('#addForm').attr('action', '/cartadd/'+stock_id);
        });
    </script>
@endsection