@extends('layouts.front')

@section('content')
    <h1 class="text-center">YOUR SHOPPING BAG</h1>
    <p class="text-center pb-2 text-grey2"><i>Items reserved for limited time only</i></p>
    @if(isset($errorMsg))
    <div class="row justify-content-center">
        <span class="col-auto alert alert-danger">
            {{ $errorMsg }}
        </span>
    </div>
    @endif
    <!--SHOPPING CART TABLE!-->
    <table class="w-100 font-size1 table table-striped table-responsive-sm">
        <thead>
        <tr>
            <th>PRODUCT</th>
            <th class="table-desc-width">DESCRIPTION</th>
            <th class="pr-2">COLOR</th>
            <th class="pr-2">SIZE</th>
            <th class="pr-2">QTY</th>
            <th class="pr-2">AMOUNT</th>
            <th class="text-center">DELETE</th>
        </tr>
        </thead>
        <tbody>
        @foreach(Cart::content() as $row)
            <?php
                //Place queries in variables to reduct amount of queries
                $model = $row->model;
                $product = $model->product;
            ?>
            <tr>
                <td class="text-center align-middle">
                    <a href="{{ route('productdetail', $row->options->product_id) }}">
                        <img src="{{ $row->options->thumbnail_path }}" alt="" class="img-cart">
                    </a>
                </td>
                <td class="align-middle">
                    <a href="{{ route('productdetail', $row->options->product_id) }}">
                    <p class="mb-0"><strong>{{ $row->name }}</strong>
                        <br><i class="text-grey2">Ref.&nbsp;{{ $row->options->article_no }}</i></p>
                    </a>
                </td>
                <td class="align-middle">
                    @foreach($product->colors as $key=>$color)
                        @if($key >= 1)
                            {{ "/" }}
                        @endif
                        {{ $color->name }}
                    @endforeach
                </td>
                <td class="align-middle">{{ $row->options->size }}{{ "&nbsp;" . $product->sizeUnits() }}</td>
                <td class="align-middle">
                    <span class="pr-1">{{ $row->qty }}</span>
                        <a href="{{ route('cartadd', $row->id) }}"><span class="fa fa-plus"></span></a>
                        <a href="{{ route('cartremove', $row->rowId) }}"><span class="fa fa-minus"></span></a>
                </td>
                <td class="align-middle">&euro;&nbsp;{{ $row->price }}</td>
                <td class="text-center align-middle">
                    <a href="#" onclick="event.preventDefault();document.getElementById('deleteForm{{$row->id}}').submit();">
                        <span class="fas fa-times"></span>
                    </a>
                    <!-- Form -->
                    {!! Form::open(['method' => 'DELETE', 'action' => ['front\CartController@destroy', $row->rowId], 'class' => 'col-sm-6', 'id' => 'deleteForm'.$row->id]) !!}
                    {!! Form::submit('Delete', ['class' => 'd-none']) !!}
                    {!! Form::close() !!}
                    <!-- /Form -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if(Cart::content()->count() == 0)
        <p class="text-center">There are currently no items in your shopping cart</p>
        <div class="divider"></div>
        @else
        <div class="divider"></div>
        @if(!Auth::user())
    <!--USER INFO FORM -->
    <form action="#" class="text-grey2">
        <h2 class="text-center pt-5 text-black">SHIPPING ADDRESS</h2>
        <p class="text-center pb-3"><i>All fields are required</i></p>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="delivery-method">SELECT DELIVERY METHOD</label>
                <select id="delivery-method" class="form-control form-control-sm" name="delivery-method">
                    <option value="1">DHL International - &euro; 15.00</option>
                    <option value="2">DHL International 2 - &euro; 15.00</option>
                </select>
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="first-name">FIRST NAME</label>
                <input class="form-control" type="text" id="first-name">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="last-name">LAST NAME</label>
                <input class="form-control" type="text" id="last-name">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="address1">ADDRESS (line 1)</label>
                <input class="form-control" type="text" id="address1">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="address2">ADDRESS (line 2)</label>
                <input class="form-control" type="text" id="address2">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="city">CITY</label>
                <input class="form-control" type="text" id="city">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="postal-code">POSTAL CODE</label>
                <input class="form-control" type="text" id="postal-code">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="phone">PHONE NUMBER</label>
                <input class="form-control" type="text" id="phone">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="email">E-MAIL</label>
                <input class="form-control" type="email" id="email">
            </div>
        </div>
        <div class="form-check text-center">
            <input type="checkbox" class="form-check-input" id="checkbox-billing">
            <label class="form-check-label" for="checkbox-billing">Use this address for Billing</label>
        </div>
        <div class="divider my-5"></div>
        <img class="d-block mx-auto" src="{{ asset('images/shape1.png') }}" alt="">
        <div class="divider my-5"></div>
            @endif

        <!--Payment options-->
        <h2 class="text-center pt-5 text-black">PAYMENT OPTIONS</h2>
        <p class="text-center pb-3"><i>All fields are required</i></p>
        <p class="text-center">Subtotal:&nbsp;&nbsp;<i>&euro;{{ Cart::subtotal() }}</i></p>
        <p class="text-center">Shipping:&nbsp;&nbsp;<i>&euro;15.00</i></p>
        <p class="text-center text-orange pb-4">Total:&nbsp;&nbsp;<i>&euro;{{ Cart::subtotal() }}</i></p>
        <div class="row justify-content-center pb-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="payment-method">SELECT PAYMENT METHOD</label>
                <select id="payment-method" class="form-control form-control-sm" name="payment-method">
                    <option value="1">Credit Card</option>
                    <option value="2">PayPal</option>
                </select>
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="#" class="btn btn-orange text-white px-5 py-2">ORDER NOW</a>
        </div>
    </form>
    @endif
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection