@extends('client.v2.layout')

@section('v2.content')

    @include('client.v2.sections.header')

    @include('client.v2.sections.breadcrumbs')

    <div class="container">
        <div class="row">
            @include('client.v2.sections.cart.checkout')
        </div>
    </div>

    @include('client.v2.sections.footer')

@endsection
