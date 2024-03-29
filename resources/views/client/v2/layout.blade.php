<!DOCTYPE html>
<html lang="ru-UA">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157621129-1"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-181175887-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-157621129-1');
            gtag('config', 'UA-181175887-1');
        </script>

        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <meta name="google-site-verification" content="WKXewrjaaWNauMFAmJYGPl0te_wzYwKwAmYIdBgq9gE">

        <title>{{ $metaData['title'] ?? 'Інтернет-магазин Autoglass House' }}</title>
        <link rel="icon" href="{{ asset('storage/icon-sm.ico') }}" type="image/icon type">
        <link rel="apple-touch-icon" href="{{ asset('storage/icon-big-white.ico') }}" type="image/icon type">
        <meta name="description" content="{{ $metaData['description'] ?? 'Інтернет-магазин Autoglass House' }}">
        <meta name="keywords" content="{{ $metaData['keywords'] ?? '' }}">
        <meta name="robots" content="index, follow">

        <!-- Sitemap -->
        <link href='{{ url('sitemap.xml') }}' rel='alternate' title='Sitemap' type='application/rss+xml'/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Google Fonts -->
        <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" onload="this.rel='stylesheet'">

        <!-- Vendor CSS Files -->
        <link href="/landing_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preload" as="style" href="/landing_assets/icofont/icofont.min.css" onload="this.rel='stylesheet'">
        <link rel="preload" as="style" href="/landing_assets/animate.css/animate.min.css" onload="this.rel='stylesheet'">
        <link rel="preload" as="style" href="/landing_assets/owl.carousel/assets/owl.carousel.min.css" onload="this.rel='stylesheet'">

        <!-- Template Main CSS File -->
        <link rel="preload" as="style" href="/css/style.css" onload="this.rel='stylesheet'">

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
                    <i class="icofont-phone"></i> <i class="icofont-brand-viber" style="color: #665CAC;"></i> <i class="icofont-telegram" style="color: #0088cc;"></i> <a href="tel:+380986921349">+38 (098) 692 13 49</a>
                    <i class="icofont-calendar"></i> <a href="#"> Пн-Пт.: с 9:30 до 17:00</a>
                </div>
            </div>
        </div>

        @yield('v2.content')

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

        <!-- Vendor JS Files -->
        <script defer src="/js/jquery-3.5.1.min.js"></script>
        <script defer src="/landing_assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script defer src="/landing_assets/jquery.easing/jquery.easing.min.js"></script>
        <script defer src="/landing_assets/owl.carousel/owl.carousel.min.js"></script>
        <script defer src="/landing_assets/isotope-layout/isotope.pkgd.min.js"></script>

        <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <!-- Template Main JS File -->
        <script defer src="/js/main.js"></script>
        <script defer src="/js/shop-scripts.js"></script>

    </body>
</html>
