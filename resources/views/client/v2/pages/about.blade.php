@extends('client.v2.layout')

@section('v2.content')

    <script type="application/ld+json">
     {
     "@context": "https://schema.org",
     "@type": "Organization",
     "name": " Autoglass House",
     "legalName": "Autoglass House",
     "url": "https://autoglasshouse.com.ua",
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
         "@id": "https://autoglasshouse.com.ua/about-us",
         "name": "О Нас"
       }
      }
     ]
    }
    </script>

    @include('client.v2.sections.header')

    @include('client.v2.sections.breadcrumbs')

    @include('client.v2.sections.about-us')

    @include('client.v2.sections.cta')

    @include('client.v2.sections.footer')

@endsection
