<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="{{ route('new-client.landing') }}">Autoglass House</a></h1>
{{--        Uncomment below if you prefer to use an image logo--}}
{{--        <a href="#" class="logo mr-auto"><img src="{{ asset('storage/img/logo_low.png') }}" alt="" class="img-fluid"></a>--}}

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="@if(route('new-client.landing') == $pageData['currentUrl']) active @endif"><a href="{{ route('new-client.landing') }}">Главная</a></li>
                <li class="@if(route('new-client.about-us') == $pageData['currentUrl']) active @endif"><a href="{{ route('new-client.about-us') }}">О нас</a></li>
                <li class="@if(route('new-client.catalog') == $pageData['currentUrl']) active @endif"><a href="{{ route('new-client.catalog') }}">Каталог</a></li>
                <li class="contactsItem @if(route('new-client.contacts') == $pageData['currentUrl']) active @endif"><a href="{{ route('new-client.contacts') }}">Контакты</a></li>
                <li class="@if(route('new-client.checkout') == $pageData['currentUrl']) active @endif">
                    <a href="{{ route('new-client.checkout') }}">
                        <i class="icofont-cart"></i>
                        <span class="cartQuantity" id="cartQuantity" data-currentQuantity="{{ $sidebarData['cartCount'] }}">@if($sidebarData['cartCount'] > 0) ({{ $sidebarData['cartCount'] }}) @endif</span>
                        Корзина
                    </a>
                </li>
            </ul>
        </nav>

        <a href="{{ route('new-client.contacts') }}" class="get-started-btn scrollto">Обратный звонок</a>

    </div>
</header>
