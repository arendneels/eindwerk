@extends('layouts.front')

@section('content')
    <h1 class="text-center pt-4 pt-md-6 text-uppercase">HI {{ Auth::user()->first_name }},<br>THIS IS YOUR ORDER HISTORY</h1>
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
        <tr>
            <td>
                #28364
            </td>
            <td>
                21/05/2014
            </td>
            <td>
                <div class="d-flex py-1">
                    <img src="http://via.placeholder.com/350x150" alt="" class="img-history pr-2">
                    <p class="mb-0"><strong>FLORAL PLIMSOLL</strong>
                        <br><i class="text-grey2">Ref. 2514/302</i></p>
                </div>
                <div class="d-flex py-1">
                    <img src="http://via.placeholder.com/350x150" alt="" class="img-history pr-2">
                    <p class="mb-0"><strong>FLORAL PLIMSOLL</strong>
                        <br><i class="text-grey2">Ref. 2514/302</i></p>
                </div>
                <div class="d-flex py-1">
                    <img src="http://via.placeholder.com/350x150" alt="" class="img-history pr-2">
                    <p class="mb-0"><strong>FLORAL PLIMSOLL</strong>
                        <br><i class="text-grey2">Ref. 2514/302</i></p>
                </div>
            </td>
            <td>OPEN</td>
            <td>22/05/2014</td>
            <td class="text-right">&euro;345.00</td>
        </tr>
        <tr>
            <td>
                #28365
            </td>
            <td>
                11/05/2014
            </td>
            <td>
                <div class="d-flex py-1">
                    <img src="http://via.placeholder.com/350x150" alt="" class="img-history pr-2">
                    <p class="mb-0"><strong>DRESS WITH KNOT AT THE BACK</strong>
                        <br><i class="text-grey2">Ref. 7583/890</i></p>
                </div>
            </td>
            <td>PAID</td>
            <td>13/05/2014</td>
            <td class="text-right">&euro;105.00</td>
        </tr>
        </tbody>
    </table>
    <div class="row pb-5">
        <div class="col-12">
            <button class='btn bg-grey text-grey2 w-100 font-size2'>SHOW MORE ITEMS</button>
        </div>
    </div>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>You may also like</em></p>
@endsection