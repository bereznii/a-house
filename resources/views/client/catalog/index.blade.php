@extends('client.layout')

@section('content')

    @include('client.includes.sidebar')

    @include('client.catalog.catalog-page')

    @include('client.includes.callback-modal')

@endsection
