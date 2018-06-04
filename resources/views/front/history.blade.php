@extends('layouts.front')

@section('content')
    <h1 class="text-center pt-4 pt-md-6 text-uppercase">HI {{ $user->first_name }},<br>THIS IS YOUR ORDER HISTORY</h1>
    <div class="text-center pt-5 pt-md-6 pb-6 pb-md-7"><a href="{{ route('editaccount') }}" class="border p-3">EDIT YOUR ACCOUNT</a></div>
    <!--HISTORY TABLE!-->
    <table class="w-100 font-size1 table table-striped table-responsive-sm">
        <thead>
        <tr>
            <th class="pr-2">ORDER NO</th>
            <th class="pr-2">ORDER DATE</th>
            <th class="table-desc-width">PRODUCTS</th>
            <th class="pr-2">STATUS</th>
            <th class="pr-2">SHIP DATE</th>
            <th class="pr-2 text-right">TOTAL AMOUNT</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>
                #{{ $order->id }}
            </td>
            <td>
                {{ $order->created_at->format('d/m/Y') }}
            </td>
            <td>
                @foreach($order->stocks as $stock)
                <div class="d-flex py-1">
                    <img src="http://via.placeholder.com/350x150" alt="" class="img-history pr-2">
                    <p class="mb-0">
                        <strong>
                            {{ $stock->product->name . ' - Size ' . $stock->size->name }}
                            @if($stock->pivot->amt > 1)
                                {{ ' (' . $stock->pivot->amt . ' pcs)' }}
                            @endif
                        </strong>
                        <br>
                        <i class="text-grey2">Ref. {{ $stock->product->article_no }}</i>
                    </p>
                </div>
                @endforeach
            </td>
            <td>{{ $order->status }}</td>
            <td>
                @if($order->shipping_date)
                    {{  $order->shipping_date->format('d/m/Y') }}
                    @else
                    TBD
                @endif
            </td>
            <td class="text-right">&euro;&nbsp;{{ $order->total }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $orders->links('layouts.pagination') }}
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>You may also like</em></p>
@endsection