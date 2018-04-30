<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bootstrap Template</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="icon" href="http://via.placeholder.com/350x150">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body class="container-fluid bg-grey">
<!--LINK TO INDEX!-->
<div class="text-center my-5 font-size5"><a href="{{ route('index') }}"><span class="text-white border p-3">&nbsp;SH&nbsp;</span></a></div>
<!--SIGN IN BOX!-->
<main class="container">
    <div class="row justify-content-center py-3">
        <!--SIGN IN FORM!-->
        <form action="{{ route('login') }}" class="col-10 col-md-7 col-lg-5 bg-white box-shadow" method="post">
            {{ csrf_field() }}
            <h1 class="text-center py-5 mb-0">SIGN IN</h1>
            <div class="form-group py-2 mx-3 mx-md-3 mx-lg-5">
                <label for="email" class="font-size1">E-MAIL</label>
                <input class="form-control" type="email" id="email" name="email">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <p>{{ $errors->first('email') }}</p>
                    </div>
                @endif
            </div>
            <div class="form-group py-2 mx-3 mx-md-3 mx-lg-5">
                <p class="font-size1">PASSWORD<span class="float-right"><a href="{{ route('password.request') }}" class="text-orange">Forgot password?</a></span></p>
                <input class="form-control" type="password" id="password" name="password">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        <p>{{ $errors->first('password') }}</p>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="text-center font-size1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <input type="submit" class="btn btn-orange text-white font-size2 px-5" value="LOG IN">
            </div>
            <p class="font-size1 text-center py-2"><a href="{{ route('register') }}" class="text-orange">I don't have an account</a></p>
        </form>
    </div>
</main>
<!--Javascript!-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fontawesome-all.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
