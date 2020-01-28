<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AH</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Place your kit's code here -->
    <script src="{{ url('/js/fontawesome.js') }}" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/shop-homepage.css') }}" />

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-darkgreen fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('client.index') }}">Autoglass House</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item  @if(route('client.about') != url()->current() && route('client.contact') != url()->current() && route('client.checkout') != url()->current()) active @endif">
                        <a class="nav-link" href="{{ route('client.index') }}">Каталог
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item @if(route('client.about') == url()->current()) active @endif">
                        <a class="nav-link" href="{{ route('client.about') }}">О нас</a>
                    </li>
                    <li class="nav-item @if(route('client.contact') == url()->current()) active @endif">
                        <a class="nav-link" href="{{ route('client.contact') }}">Контакты</a>
                    </li>
                    <li class="nav-item @if(route('client.checkout') == url()->current()) active @endif">
                        <a class="nav-link" href="{{ route('client.checkout') }}"><i class="fas fa-shopping-cart"></i> Корзина</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

        @yield('content')

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-darkgreen">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Autoglass House {{ now()->year }}</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="{{ url('/js/shop-scripts.js') }}"></script>

</body>

</html>
