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
         "@context": "https://schema.org",
         "@type": "Organization",
         "name": " Autoglass House",
         "legalName": "Autoglass House",
         "url": "https://autoglasshouse.com.ua/",
         "description": "Наш интернет-магазин 'Autoglass House' осуществляет продажу и установку автомобильных стёкол таких мировых брендов как Sekurit, Pilkington, AGC, Splintex, Autover, PGW и другие, а также украинского производителя SafeGlass. Мы подберём Вам любое стекло на любой автомобиль. Если вам неудобно приехать к нам, мы доставим и установим стекло по указаному адресу. Для Вашего удобства у нас есть выездной сервис. Клиентам с других регионов доставим стекло перевозчиком 'Новая почта', 'Гюнсел' и др. Всегда готовы помочь Вам в вопросе подбора, доставки и установки нужного стекла!",
         "logo": "{{ asset('storage/logo.png') }}",
         "foundingDate": "2020",
         "contactPoint": {
             "@type": "ContactPoint",
             "contactType": "Customer support",
             "email": "autoglasshouse20@gmail.com",
             "telephone" : "+380986921349"
            }
     }
    </script>

    @include('client.v2.sections.header')

    @include('client.v2.sections.hero')

    @include('client.v2.sections.featured-services')

    @include('client.v2.sections.about-us')

    @include('client.v2.sections.services')

    @include('client.v2.sections.vendors')

    @include('client.v2.sections.cta')

    @include('client.v2.sections.contacts')

    @include('client.v2.sections.footer')

@endsection
