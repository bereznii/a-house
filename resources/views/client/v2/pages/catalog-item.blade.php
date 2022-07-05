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
        "name": "Інтернет-магазин Autoglass House"
        }
      },
      {
       "@type": "ListItem",
       "position": 2,
       "item":
       {
        "@id": "https://autoglasshouse.com.ua/filter?makes={{ $product->make_id ?? '' }}",
        "name": "{{ $product->make->name ?? '' }}"
        }
      },
      {
       "@type": "ListItem",
      "position": 3,
      "item":
       {
         "@id": "https://autoglasshouse.com.ua/filter?makes={{ $product->make_id ?? '' }}&models={{ $product->model_id ?? '' }}",
         "name": "{{ $product->model->name ?? '' }}"
       }
      },
      {
       "@type": "ListItem",
      "position": 4,
      "item":
       {
         "@id": "https://autoglasshouse.com.ua/filter?makes={{ $product->make_id ?? '' }}&models={{ $product->model_id ?? '' }}&types={{ $product->type_id ?? '' }}",
         "name": "{{ $product->type->translation ?? '' }}"
       }
      }
     ]
    }
    </script>

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
