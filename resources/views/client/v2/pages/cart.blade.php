@extends('client.v2.layout')

@section('v2.content')

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "url": "http://autoglasshouse.com.ua/",
            "potentialAction": {
              "@type": "SearchAction",
              "target": "https://autoglasshouse.com.ua/search?query={query}",
              "query": "required"
            }
        }
    </script>

    @include('client.v2.sections.header')

    @include('client.v2.sections.breadcrumbs')

    <div class="container">
        <div class="row">
            @if(isset($thank))
                @include('client.v2.sections.cart.thank-page')
            @else
                @include('client.v2.sections.cart.checkout')
            @endif
        </div>
    </div>

    @include('client.v2.sections.footer')

@endsection
