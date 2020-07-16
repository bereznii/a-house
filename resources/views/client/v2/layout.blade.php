<!DOCTYPE html>
<html lang="ru-UA">

    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
{{--        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157621129-1"></script>--}}
{{--        <script>--}}
{{--            window.dataLayer = window.dataLayer || [];--}}
{{--            function gtag(){dataLayer.push(arguments);}--}}
{{--            gtag('js', new Date());--}}

{{--            gtag('config', 'UA-157621129-1');--}}
{{--        </script>--}}

        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <meta name="google-site-verification" content="WKXewrjaaWNauMFAmJYGPl0te_wzYwKwAmYIdBgq9gE">

        <title>{{ $metaData['title'] ?? 'Интернет-магазин Autoglass House' }}</title>
        <link rel="icon" href="{{ asset('storage/icon-sm.ico') }}" type="image/icon type">
        <link rel="apple-touch-icon" href="{{ asset('storage/icon-sm.ico') }}" type="image/icon type">
        <meta name="description" content="{{ $metaData['description'] ?? 'Интернет-магазин Autoglass House' }}">
        <meta name="keywords" content="{{ $metaData['keywords'] ?? '' }}">
        <meta name="robots" content="noindex, nofollow" />

        <!-- Sitemap -->
        <link href='{{ url('sitemap.xml') }}' rel='alternate' title='Sitemap' type='application/rss+xml'/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ url('landing_assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('landing_assets/icofont/icofont.min.css') }}" rel="stylesheet">
        <link href="{{ url('landing_assets/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ url('landing_assets/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ url('landing_assets/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ url('landing_assets/venobox/venobox.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ url('css/style.css') }}" rel="stylesheet">

        @if(route('new-client.landing') !== $pageData['currentUrl'])
            <style>
                html, body {
                    height: 100%;
                }

                body {
                    display: flex;
                    flex-direction: column;
                    height: 100%;
                }

                footer {
                    margin-top: auto;
                }
            </style>
        @endif
    </head>

    <body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i> <a href="mailto:autoglasshouse20@gmail.com">autoglasshouse20@gmail.com</a>
                <i class="icofont-phone"></i> <a href="tel:+380986921349">+38 (098) 692 13 49</a>
            </div>
        </div>
    </div>

    @yield('v2.content')

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('landing_assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('landing_assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('landing_assets/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ url('landing_assets/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('landing_assets/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('landing_assets/venobox/venobox.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('js/main.js') }}"></script>
    <script src="{{ url('/js/shop-scripts.js') }}"></script>

    </body>

</html>
