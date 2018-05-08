@extends('layouts.front')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
@endsection

@section('content')
    <div class="text-grey2 text-uppercase">
        <a href="{{ route('index') }}" class="text-grey2">Home</a>
        <?php
            $category_id_array = [];
        ?>
        @foreach($product->categories()->limit(2)->get() as $key => $category)
            <?php
                $category_id_array[$key] = $category->id;
            ?>
        <span>/</span>
        <a href="{{ $key==0 ? route('categories', $category->id) : route('products', $category_id_array) }}" class="text-grey2">{{ $category->name }}</a>
        @endforeach
        <span>/</span>
        <a href="#" class="text-grey2">{{ $product->name }}</a>
    </div>
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
    <h1 class="text-center py-3 py-lg-5 fs-21 text-uppercase">{{ $product->name }}</h1>
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
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <h2 class="h4 text-center">REVIEWS ({{ $product->reviews->count() }})</h2>
            @foreach($product->reviews as $review)
            <article class="border p-3 fs-8 my-4" style="min-height:200px;">
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <span class="text-orange">&#9733;</span>
                        <span class="{{ $review->rating >= 2 ? "text-orange" : "" }}">&#9733;</span>
                        <span class="{{ $review->rating >= 3 ? "text-orange" : "" }}">&#9733;</span>
                        <span class="{{ $review->rating >= 4 ? "text-orange" : "" }}">&#9733;</span>
                        <span class="{{ $review->rating >= 5 ? "text-orange" : "" }}">&#9733;</span>
                        <p><span class="fs-10">{{ $review->user->first_name . " " . $review->user->last_name }}</span>
                            <br>
                            {{ $review->created_at->format('F d Y') }}
                        </p>
                    </div>
                    <div class="col-lg-9 col-12">
                        <h3 class="h5">{{ $review->title }}</h3>
                        <p>{{ $review->body }}</p>
                    </div>
                </div>
            </article>
            @endforeach
            @if(Auth::user())
            <h3 class="h5 text-center pt-4">WRITE YOUR OWN REVIEW</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ action('FrontController@addReview', $product->id) }}" method="post">
                {{ csrf_field() }}
                <label class="mb-0" for="rating">Rating</label>
                <div class="pb-2">
                    <span id="star1" class="rating-star" style="cursor:pointer;">&#9733;</span>
                    <span id="star2" class="rating-star" style="cursor:pointer;">&#9733;</span>
                    <span id="star3" class="rating-star" style="cursor:pointer;">&#9733;</span>
                    <span id="star4" class="rating-star" style="cursor:pointer;">&#9733;</span>
                    <span id="star5" class="rating-star" style="cursor:pointer;">&#9733;</span>
                    <input name="rating" id="rating" type="number" class="d-none">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" id="title" type="text" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="body">Review</label>
                    <textarea name="body" id="body" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-orange text-white">SEND REVIEW</button>
                </div>
            </form>
            @endif
        </div>
    </div>

    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0">Check our lookbook</p>
@endsection

@section('scripts')
    <script src="{{ asset('js/lightbox.min.js') }}"></script>
    <script>
        $(function(){
            //Add button
            $('#addButton').click(function(e){
                if($('#addForm').attr('action') == "") {
                    e.preventDefault();
                    $('#errorMsg').removeClass('d-none');
                }
            });

            //Size button
            $('.sizeBtn').click(function(){
                $('.sizeBtn').removeClass('bg-orange').addClass('text-grey2');
                $('#errorMsg').addClass('d-none');
                $(this).addClass('bg-orange text-white').removeClass('text-grey2');
                var stock_id = $(this).val();
                $('#addForm').attr('action', '/cartadd/'+stock_id);
            });

            //Rating stars

            $('.rating-star').hover(function(){
                var val = $(this).attr('id').replace('star', '');
                console.log(val);
                for(i=1; i<=val; i++){
                    if(!$('#star'+i).hasClass('colored')){
                        $('#star'+i).toggleClass('text-orange');
                    }
                }
            }).click(function(){
                var val = $(this).attr('id').replace('star', '');
                $('#rating').attr('value', val);
                $('.rating-star').removeClass('colored text-orange');
                for(i=1; i<=val; i++){
                    $('#star'+i).addClass('colored text-orange');
                }
            });
        });
    </script>
@endsection