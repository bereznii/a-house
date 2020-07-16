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
    @else
        <script type="application/ld+json">
         {
         "@context": "https://schema.org",
         "@type": "Organization",
         "name": " Autoglass House",
         "legalName": "Autoglass House",
         "url": "https://autoglasshouse.com.ua",
         "description": "Наш интернет-магазин 'Autoglass House' осуществляет продажу и установку автомобильных стёкол таких мировых брендов как (Sekurit, Pilkington, AGC, Splintex, Autover, PGW и другие), а также Украинского производителя SafeGlass. Мы подберём Вам любое стекло на любой автомобиль. Если вам неудобно приехать к нам, мы доставим и установим(при соответствующих условиях) стекло по указаному адресу. Для Вашего удобства у нас есть выездной сервис.Нашим клиентам с других регионов, доставим стекло перевозчиком 'Новая почта', 'Гюнсел' и др. Всегда готовы помочь Вам в вопросе подбора, доставки и установки нужного стекла!",
         "logo": "{{ asset('storage/logo.png') }}",
         "foundingDate": "2020",
         "contactPoint": {
             "@type": "ContactPoint",
             "contactType": "Customer support",
             "email": "autoglasshouse20@gmail.com"
            }
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
