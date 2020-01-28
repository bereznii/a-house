@extends('client.layout')

@section('content')

    @include('client.includes.sidebar')

    @if(isset($thank))
        @include('client.checkout.thank-page')
    @else
        @include('client.checkout.checkout-page')
    @endif
@endsection
