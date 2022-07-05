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
        "description": "Наш інтернет-магазин 'Autoglass House' здійснює продаж та встановлення автомобільних стекол таких світових брендів як Sekurit, Pilkington, AGC, Splintex, Autover, PGW та інші, а також українського виробника SafeGlass. Ми підберемо Вам будь-яке скло на будь-який автомобіль. Якщо вам незручно приїхати до нас, ми доставимо та встановимо скло за вказаною адресою. Для Вашої зручності ми маємо виїзний сервіс. Клієнтам з інших регіонів доставимо скло перевізником 'Нова пошта', 'Гюнсел' та ін. Завжди готові допомогти Вам у питанні підбору, доставки та встановлення потрібного скла!",
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
