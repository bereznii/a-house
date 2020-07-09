<!DOCTYPE html>
<html lang="ru-UA">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Green Bootstrap Template - Index</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ url('landing_img/favicon.png') }}" rel="icon">
        <link href="{{ url('landing_img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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

    </body>

</html>
