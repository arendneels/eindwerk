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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Women<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="men.html">Men</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kids</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Coming Soon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link"><span class="fas fa-user"></span>&nbsp;Log In</a>
                    </li>
                    <li id="basket" class="nav-item position-relative ml-lg-2 border border-white border-bottom-0">
                        <a href="shoppingcart.html" class="nav-link"><span class="fas fa-shopping-basket"></span>&nbsp;Basket (2)</a>
                        <!--BASKET HOVER MENU!-->
                        <div id="hover-cart" class="position-absolute bg-white right-0 border" style="display:none;">
                            <div class="mx-3">
                                <table class="table-width-hover">
                                    <tbody class="">
                                    <tr class="border-bottom">
                                        <td class="py-3"><img src="http://via.placeholder.com/350x150" class="img-history" alt=""></td>
                                        <td class="py-2"><strong>FLORAL PLIMSSOLL</strong></td>
                                        <td>&euro;99.95</td>
                                        <td><a href="#"><span class="fas fa-times"></span></a></td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="py-3"><img src="http://via.placeholder.com/350x150" class="img-history" alt=""></td>
                                        <td class="py-2"><strong>FLORAL PLIMSSOLL</strong></td>
                                        <td>&euro;99.95</td>
                                        <td><a href="#"><span class="fas fa-times"></span></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="py-3 d-flex justify-content-between">
                                    <p class="mb-0"><strong>Subtotal: </strong><span class="text-orange">&euro;567.95</span></p>
                                    <a href="shoppingcart.html" class="btn btn-orange text-white fs-7">CHECKOUT</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--SEARCHBAR!-->
                    <li class="nav-item border ml-lg-2">
                        <form action="searchresults.html" method="post" id="searchbtn" class="d-flex bg-transparent position-relative">
                            <input id="searchbar" type="text" name="search" placeholder="Search" class="">
                            <div class="searchicon"></div>
                            <div class="fas fa-search searchicon d-block p-2 text-grey2 top-right"></div>
                            <input id="searchicon" class="nav-link bg-white bg top-right hide searchicon" type="submit" name="submit">
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
                                <div class="col-md-3 col-sm-6 col-12 mb-1 mb-md-0">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-1 mb-md-0">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-1 mb-sm-0">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-3 col-sm-6 col-12 mb-1 mb-md-0">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-1 mb-md-0">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-1 mb-sm-0">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-3 col-sm-6 col-12 mb-1 mb-md-0">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-1 mb-md-0">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-1 mb-sm-0">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <a href="detail.html" class="">
                                        <img class="w-100 h-100" src="http://via.placeholder.com/350x150" alt="">
                                    </a>
                                </div>
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
                    <li><a href="#">Women (1725)</a></li>
                    <li><a href="men.html">Men (635)</a></li>
                    <li><a href="#">Kids (2514)</a></li>
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
                    <li><a href="about.html">About us</a></li>
                    <li><a href="#">Shipping Methods</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="contact.html">Contact</a></li>
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