@extends('admin.app')

@section('content')
    <div class="col-lg-3">

        <div class="list-group">
            <a href="{{ route('home.import') }}" class="list-group-item active">Импорт каталога</a>
            <a href="{{ route('home.manufacturer-charge') }}" class="list-group-item">Наценка по поставщикам</a>
            <a href="{{ route('home.user-activity') }}" class="list-group-item">История активности пользователей</a>
            <a href="{{ route('home.callbacks') }}" class="list-group-item">Запросы на обратный звонок</a>
        </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">
        @yield('page')
    </div>
    <!-- /.col-lg-9 -->
@endsection
