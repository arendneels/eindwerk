@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Test OK</p>
        <br>
        <br>
        @foreach($products as $product)
            <p>{{ $product->name }}</p>
            @foreach($product->colors as $color)
                <p>{{ $color->name }}</p>
            @endforeach
            @foreach($product->categories as $category)
                <p>{{ $category->name }}</p>
            @endforeach
            @foreach($product->photos as $photo)
                <p>{{ $photo->path() }}</p>
            @endforeach
        @endforeach
    </div>
@endsection