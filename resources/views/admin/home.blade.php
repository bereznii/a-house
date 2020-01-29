@extends('admin.app')

@section('content')
    <div class="col-lg-3">

        <div class="list-group">
            <a href="{{ route('home') }}" class="list-group-item @if(route('home') == url()->current()) active @endif">Импорт каталога</a>
            <a href="{{ route('home.manufacturer-charge') }}" class="list-group-item @if(route('home.manufacturer-charge') == url()->current()) active @endif">Наценка по поставщикам</a>
            <a href="{{ route('home.user-activity') }}" class="list-group-item @if(route('home.user-activity') == url()->current()) active @endif">История активности пользователей</a>
            <a href="{{ route('home.callbacks') }}" class="list-group-item @if(route('home.callbacks') == url()->current()) active @endif">Запросы на обратный звонок</a>
            <a href="{{ route('orders.index') }}" class="list-group-item @if(route('orders.index') == url()->current()) active @endif">Заказы</a>
        </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">
        @yield('page')
    </div>
    <!-- /.col-lg-9 -->
@endsection
