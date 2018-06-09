@extends('layouts.front')

@section('content')
    <h1 class="text-center">YOUR SHOPPING BAG</h1>
    <p class="text-center pb-2 text-grey2"><i>Items reserved for limited time only</i></p>
    @if(session('stockError'))
        <div class="row justify-content-center">
        <span class="col-auto alert alert-danger">
            {{ session('stockError') }}
        </span>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
    <!--USER INFO FORM -->
    <form id="payment-form" method="post" action="{{ route('payment.success') }}" class="text-grey2">
        {{ csrf_field() }}
        @if(!$user = Auth::user())
        <h2 class="text-center pt-5 text-black">SHIPPING ADDRESS</h2>
        <p class="text-center pb-3"><i>All fields are required</i></p>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="delivery-method">SELECT DELIVERY METHOD</label>
                <select id="shipping-method" class="form-control form-control-sm" name="shippingmethod_id">
                    @foreach($shippingmethods as $shippingmethod)
                        <option value="{{ $shippingmethod->id }}">{{ $shippingmethod->name }} - &euro; {{ $shippingmethod->price }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="first-name">FIRST NAME</label>
                <input name="first_name" class="form-control" type="text" id="first-name" required>
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="last-name">LAST NAME</label>
                <input name="last_name" class="form-control" type="text" id="last-name" required>
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="address1">ADDRESS (line 1)</label>
                <input name="address" class="form-control" type="text" id="address1" required>
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="address2">ADDRESS (line 2)</label>
                <input name="address2" class="form-control" type="text" id="address2">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="city">CITY</label>
                <input name="city" class="form-control" type="text" id="city" required>
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="postal-code">POSTAL CODE</label>
                <input name="postal_code" class="form-control" type="text" id="postal-code" required>
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="phone">PHONE NUMBER</label>
                <input name="phone" class="form-control" type="text" id="phone" required>
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="email">E-MAIL</label>
                <input name="email" class="form-control" type="email" id="email" required>
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="country_id">COUNTRY</label>
                <select id="country_id" class="form-control form-control-sm" name="country_id">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-check text-center">
            <input name="checkbox_create" type="checkbox" class="form-check-input" id="create-account">
            <label class="form-check-label" for="checkbox-shipping">I wish to create an account.</label>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div id="password-field" class="form-group col-12 col-md-8 col-lg-6 d-none text-center justify-content-center">
                <label for="password">PASSWORD</label>
                <input name="password" class="form-control" type="password" id="password">
                <small id="passwordHelp" class="form-text text-muted">The password should be at least 6 characters</small>
            </div>
        </div>
            @else
            <h2 class="text-center pt-5 text-black">SHIPPING ADDRESS</h2>
            <div class="row justify-content-around">
                <div class="col-auto">
                    <ul class="list-unstyled">
                        <li><em>First name: </em>{{ $user->first_name }}</li>
                        <li><em>Last name: </em>{{ $user->last_name }}</li>
                        <li><em>Email: </em>{{ $user->email }}</li>
                        <li><em>Phone Number: </em>{{ $user->phone }}</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="list-unstyled">
                        <li><em>Address: </em>
                            {{ $user->address }}
                        @if($user->address2)
                            <br>
                            {{ $user->address2 }}
                        @endif
                        </li>
                        <li><em>City: </em>{{ $user->city }}</li>
                        <li><em>Country: </em>{{ $user->country->name }}</li>
                        <li><em>Postal Code: </em>{{ $user->postal_code }}</li>
                    </ul>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-12 col-md-8 col-lg-6">
                    <label for="delivery-method">SELECT DELIVERY METHOD</label>
                    <select id="shipping-method" class="form-control form-control-sm" name="shippingmethod_id">
                        @foreach($shippingmethods as $shippingmethod)
                            <option value="{{ $shippingmethod->id }}">{{ $shippingmethod->name }} - &euro; {{ $shippingmethod->price }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-check text-center">
                <input name="checkbox_shipping" type="checkbox" class="form-check-input" id="checkbox-shipping">
                <label class="form-check-label" for="checkbox-shipping">Use different shipping address for this order</label>
            </div>

            <div id="shipping-form-2" class="d-none">
                <p class="text-center pb-3"><i>All fields are required</i></p>
                <div class="row justify-content-center py-1 py-md-2">
                    <div class="form-group col-12 col-md-8 col-lg-6">
                        <label for="shipping-method">SELECT SHIPPING METHOD</label>
                        <select id="shipping-method" class="form-control form-control-sm" name="shippingmethod_id">
                            @foreach($shippingmethods as $shippingmethod)
                            <option value="{{ $shippingmethod->id }}">{{ $shippingmethod->name }} - &euro; {{ $shippingmethod->price }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center py-1 py-md-2">
                    <div class="form-group col-6 col-md-4 col-lg-3">
                        <label for="first-name">FIRST NAME</label>
                        <input name="first_name" class="form-control" type="text" id="first-name">
                    </div>
                    <div class="form-group col-6 col-md-4 col-lg-3">
                        <label for="last-name">LAST NAME</label>
                        <input name="last_name" class="form-control" type="text" id="last-name">
                    </div>
                </div>
                <div class="row justify-content-center py-1 py-md-2">
                    <div class="form-group col-12 col-md-8 col-lg-6">
                        <label for="address1">ADDRESS (line 1)</label>
                        <input name="address" class="form-control" type="text" id="address1">
                    </div>
                </div>
                <div class="row justify-content-center py-1 py-md-2">
                    <div class="form-group col-12 col-md-8 col-lg-6">
                        <label for="address2">ADDRESS (line 2)</label>
                        <input name="address2" class="form-control" type="text" id="address2">
                    </div>
                </div>
                <div class="row justify-content-center py-1 py-md-2">
                    <div class="form-group col-6 col-md-4 col-lg-3">
                        <label for="city">CITY</label>
                        <input name="city" class="form-control" type="text" id="city">
                    </div>
                    <div class="form-group col-6 col-md-4 col-lg-3">
                        <label for="postal-code">POSTAL CODE</label>
                        <input name="postal_code" class="form-control" type="text" id="postal-code">
                    </div>
                </div>
                <div class="row justify-content-center py-1 py-md-2">
                    <div class="form-group col-12 col-md-8 col-lg-6">
                        <label for="country_id">COUNTRY</label>
                        <select id="country_id" class="form-control form-control-sm" name="country_id">
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @endif

        <div class="divider my-5"></div>
        <img class="d-block mx-auto" src="{{ asset('images/shape1.png') }}" alt="">
        <div class="divider my-5"></div>

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
                <div class="form-group">
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>
            </div>
        </div>
        <div class="form-check text-center">
            <input type="checkbox" class="form-check-input" id="checkbox-billing" required>
            <label class="form-check-label" for="checkbox-billing">I have read and agree to the <a href="{{ route('terms') }}" class="text-orange">terms of conditions</a></label>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-orange text-white px-5 py-2">ORDER NOW</button>
        </div>
    </form>
    @endif
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/myStripe.js"></script>
    <script>
        $(function(){

            //if attr('checked')->addClass d-none else removeClass d-none
            if($('#checkbox-shipping').prop('checked')){
                $('#shipping-form-2').removeClass('d-none');
            }else{
                $('#shipping-form-2').addClass('d-none');
            }

            //if attr('checked')->addClass d-none else removeClass d-none
            if($('#create-account').prop('checked')){
                $('#password-field').removeClass('d-none');
            }else{
                $('#password-field').addClass('d-none');
            }

            //Shipping form
            $('#checkbox-shipping').click(function(){
                //if attr('checked')->addClass d-none else removeClass d-none
                if($('#checkbox-shipping').prop('checked')){
                    $('#shipping-form-2').removeClass('d-none');
                }else{
                    $('#shipping-form-2').addClass('d-none');
                }
            });

            //Password field
            $('#create-account').click(function(){
                //if attr('checked')->addClass d-none else removeClass d-none
                if($('#create-account').prop('checked')){
                    $('#password-field').removeClass('d-none');
                }else{
                    $('#password-field').addClass('d-none');
                }
            });

        });
    </script>
@endsection