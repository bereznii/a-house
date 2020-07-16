@extends('client.v2.layout')

@section('v2.content')

    @if(isset($products))
        <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "ItemList",
            "url": "{{ url()->current() }}",
            "numberOfItems": "{{ $products->count() }}",
            "itemListElement": [
            @foreach ($products as $key => $product)
                {
                    "@type": "ListItem",
                    "position": {{ $key+1 }},
                    "url": "https://autoglasshouse.com.ua/automotive/{{ $product->id }}"
                }
                @if($key != $products->count()-1)
                        ,
                @endif
            @endforeach
            ]
        }
        </script>
    @endif

    @include('client.v2.sections.breadcrumbs')

    @include('client.v2.sections.header')

    <div class="container">
        <div class="row">
            @include('client.v2.sections.catalog.sidebar')
            @include('client.v2.sections.catalog.catalog-page')
        </div>
    </div>

    @include('client.v2.sections.footer')

@endsection
