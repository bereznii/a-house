@extends('client.v2.layout')

@section('v2.content')

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "Autoglass House",
            "url": "http://autoglasshouse.com.ua/",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://autoglasshouse.com.ua/search?query={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
    </script>
    <script type="application/ld+json">
    {
     "@context": "http://schema.org",
     "@type": "BreadcrumbList",
     "itemListElement":
     [
      {
       "@type": "ListItem",
       "position": 1,
       "item":
       {
        "@id": "https://autoglasshouse.com.ua/",
        "name": "Интернет-магазин Autoglass House"
        }
      },
      {
       "@type": "ListItem",
      "position": 2,
      "item":
       {
         "@id": "https://autoglasshouse.com.ua/checkout",
         "name": "Корзина"
       }
      }
     ]
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
