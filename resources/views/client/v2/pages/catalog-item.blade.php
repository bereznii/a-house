@extends('client.v2.layout')

@section('v2.content')

    @include('client.v2.sections.breadcrumbs')

    @include('client.v2.sections.header')

    <div class="container">
        <div class="row">
            @include('client.v2.sections.catalog.sidebar')
            @include('client.v2.sections.catalog.catalog-item')
        </div>
    </div>

    @include('client.v2.sections.footer')

@endsection
