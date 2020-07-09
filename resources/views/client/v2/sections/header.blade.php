<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="{{ route('new-client.landing') }}">Autoglass House</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.blade.php" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="{{ route('new-client.landing') }}">Главная</a></li>
                <li><a href="{{ route('new-client.about-us') }}">О нас</a></li>
                <li><a href="{{ route('new-client.catalog') }}">Каталог</a></li>
                <li><a href="{{ route('new-client.contacts') }}">Контакты</a></li>
            </ul>
        </nav>

        <a href="#about" class="get-started-btn scrollto">Заказать обратный звонок</a>

    </div>
</header>
