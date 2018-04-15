@extends('layouts.app')

@section('content')
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
    @endforeach
@endsection