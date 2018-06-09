@extends('layouts.front')

@section('content')
    <h1 class="d-none">TERMS OF CONDITIONS</h1>
    <div class="text-grey2"><a href="{{ route('index') }}" class="text-grey2">HOME</a> / <a href="#" class="text-grey2">TERMS OF CONDITIONS</a></div>

    <section class="mb-5 mb-lg-7 text-grey2">
        <h2 class="text-center pt-3 pt-lg-4 text-black">PRIVACY POLICY</h2>
        <p class="pb-2">The owner of this webshop HAZE is responsible for storing personal information as stated in this policy</p>
        <p>List of all the stored personal information:</p>
        <ul>
            <li>First and last name</li>
            <li>Email</li>
            <li>Phone</li>
            <li>Adress (including postal code, city, country)</li>
            <li>IP Address</li>
        </ul>
        <p>This website has no intention of collection information about users younger than age 16, unless these have been granted permission by their parent or guardian.</p>
        <p>The stored information is used for contact and shipping purposes only. Personal information will never be shared with others except for the user-chosen shipping service solely for shipping purposes.</p>
    </section>
    <div class="divider my-5"></div>
    <p class="text-center font-size-subheader pb-4 mb-0 text-gray2"><em>Check our lookbook</em></p>
@endsection