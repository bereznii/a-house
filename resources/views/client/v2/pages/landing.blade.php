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
          "target": "https://autoglasshouse.com.ua/search?query={query}",
          "query": "required"
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
         "description": "Наш интернет-магазин 'Autoglass House' осуществляет продажу и установку автомобильных стёкол. Свяжитесь с нами по телефону, вайберу или по электронной почте, закажите обратный звонок, и мы Вам перезвоним в течении 15 минут и мы поможем Вам подобрать нужно автостекло. Если вам неудобно приехать к нам, мы доставим и установим (при соответствующих условиях) стекло по указаному адресу.",
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
