<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HAZY</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    @yield('styles')
    <link rel="icon" href="http://via.placeholder.com/350x150">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body class="container-fluid bg-grey">
<div id="backgroundWhite" class="mx-auto bg-white">
    <!--HEADER!-->
    <header class="container px-0 my-5">
        <!--NAVBAR!-->
        <nav class="navbar font-size1 navbar-expand-lg navbar-light py-4">
            <a class="navbar-brand font-size1 bg-black text-white" href="{{ route('index') }}">&nbsp;SH&nbsp;</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories', 2) }}">Women</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories', 1) }}">Men</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories', 3) }}">Kids</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    @if(Auth::user() && Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') }}">Admin</a>
                        </li>
                    @endif
                </ul>
                <ul class="navbar-nav ml-auto">
                    @if(Auth::user())
                        <li class="nav-item">
                            <span class="navbar-text">
                                <span class="fas fa-user"></span>
                                <span>Hi,&nbsp;<a class="text-grey2" href="{{ route('history') }}">{{ Auth::user()->first_name }}</a>&nbsp;(</span>
                                <a class="text-orange" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <span>)</span>
                            </span>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">
                                <span class="fas fa-user"></span>&nbsp;Log In
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">&nbsp;Register</a>
                        </li>
                    @endif
                    <li id="basket" class="nav-item position-relative ml-lg-2 border border-white border-bottom-0">
                        <a href="{{ route('cart') }}" class="nav-link"><span class="fas fa-shopping-basket"></span>&nbsp;Basket ({{ Cart::content()->count() }})</a>
                        <!--BASKET HOVER MENU!-->
                        <div id="hover-cart" class="position-absolute bg-white border" style="display:none; right:-1px;">
                            <div class="mx-3">
                                @if(Cart::content()->count() > 0)
                                <table class="table-width-hover">
                                    <tbody class="">
                                    @foreach(Cart::content() as $row)
                                    <?php
                                        //Place queries in variables to reduct amount of queries
                                        $product = $row->model->product;
                                    ?>
                                    <tr class="border-bottom">
                                        <td class="py-3 text-center">
                                            <a href="{{ route('productdetail', $product->id) }}">
                                                <img src="{{ $product->thumbnail_path() }}" class="img-history" alt="">
                                            </a>
                                        </td>
                                        <td class="py-2">
                                            <a href="{{ route('productdetail', $product->id) }}">
                                                <strong>{{ $row->name }}</strong>
                                            </a>
                                        </td>
                                        <td>&euro;&nbsp;{{ $row->price }}</td>
                                        <td>
                                            @if($row->qty > 1)
                                            Qty:&nbsp;{{ $row->qty }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" onclick="event.preventDefault();
                                            if(confirm('Are you sure you want to delete this item from your basket?')){
                                                document.getElementById('deleteForm{{$row->id}}').submit();
                                            }">
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
                                <div class="py-3 d-flex justify-content-between">
                                    <p class="mb-0"><strong>Subtotal: </strong><span class="text-orange">&euro;&nbsp;{{ Cart::subtotal() }}</span></p>
                                    <a href="{{ route('cart') }}" class="btn btn-orange text-white fs-7">CHECKOUT</a>
                                </div>
                                @else
                                    <p class="m-3 text-grey2" style="width:250px;">There are currently no items in your shopping cart</p>
                                @endif
                            </div>
                        </div>
                    </li>
                    <!--SEARCHBAR!-->
                    <li class="nav-item border ml-lg-2">
                        <form action="/search" method="get" id="searchbtn" class="d-flex bg-transparent position-relative">
                            <input id="searchbar" type="text" name="term" placeholder="Search" class="" required>
                            <div class="searchicon"></div>
                            <div class="fas fa-search searchicon d-block p-2 text-grey2 top-right"></div>
                            <input id="searchicon" class="nav-link bg-white bg top-right hide searchicon" type="submit">
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="divider"></div>
    </header>


    <!--MAIN!-->
    <main class="container mt-3">

        @yield('content')

        <!--LOOKBOOK CAROUSEL!-->
            <div id="carouselExampleControls" class="carousel slide mb-2" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row justify-content-center">
                                @foreach(session('lookbook1') as $product)
                                <div class="col-md-3 col-sm-6 col-12 mb-1 mb-md-0 text-center">
                                    <a href="{{ route('productdetail', $product->id) }}" class="">
                                        <img class="w-auto" src="{{ $product->thumbnail_path() }}" alt="" style="height:100px; max-width:100%;">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row justify-content-center">
                                @foreach(session('lookbook2') as $product)
                                    <div class="col-md-3 col-sm-6 col-12 mb-1 mb-md-0 text-center">
                                        <a href="{{ route('productdetail', $product->id) }}" class="">
                                            <img class="w-auto" src="{{ $product->thumbnail_path() }}" alt="" style="height:100px; max-width:100%;">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row justify-content-center">
                                @foreach(session('lookbook3') as $product)
                                    <div class="col-md-3 col-sm-6 col-12 mb-1 mb-md-0 text-center">
                                        <a href="{{ route('productdetail', $product->id) }}" class="">
                                            <img class="w-auto" src="{{ $product->thumbnail_path() }}" alt="" style="height:100px; max-width:100%;">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev carousel-control" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="fas fa-angle-left text-black" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next carousel-control" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="fas fa-angle-right text-black" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    </main>

    <!--FOOTER!-->
    <footer class="container font-size1 mb-5">
        <div class="row py-2">
            <div class="col-sm-3 border-right">
                <p class="font-size-footer mb-1"><strong>COLLECTION</strong></p>
                <ul>
                    <li><a href="{{ route('categories', 2) }}">Women ({{ DB::table('category_product')->where('category_id', 2)->count() }})</a></li>
                    <li><a href="{{ route('categories', 1) }}">Men ({{ DB::table('category_product')->where('category_id', 1)->count() }})</a></li>
                    <li><a href="{{ route('categories', 3) }}">Kids ({{ DB::table('category_product')->where('category_id', 3)->count() }})</a></li>
                    <li><a href="#">Coming Soon (76)</a></li>
                </ul>
            </div>
            <div class="col-sm-3 border-right">
                <p class="font-size-footer mb-1"><strong>SITE</strong></p>
                <ul>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Copyright Policy</a></li>
                    <li><a href="#">Press Kit</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </div>
            <div class="col-sm-3 border-right">
                <p class="font-size-footer mb-1"><strong>SHOP</strong></p>
                <ul>
                    <li><a href="{{ route('about') }}">About us</a></li>
                    <li><a href="#">Shipping Methods</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <p class="font-size-footer mb-1"><strong>SOCIAL</strong></p>
                <p>Shoper is made with love in Warsaw,
                    <br> 2014 &copy; All rights reserved. El Passion</p>
                <div class="py-2">
                    <a href="#"><span class="border p-2 mr-lg-2 mr-1"><span class="fab fa-twitter"></span></span></a>
                    <a href="#"><span class="border p-2 mr-lg-2 mr-1"><span class="fab fa-facebook"></span></span></a>
                    <a href="#"><span class="border p-2"><span class="fab fa-instagram"></span></span></a>
                </div>
            </div>
        </div>
    </footer>
</div>
<!--Javascript!-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fontawesome-all.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('scripts')
</body>

</html>