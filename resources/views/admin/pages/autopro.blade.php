@extends('admin.home')

@section('page')

<div class="card">
    <div class="card-header">
        Каталог для autopro (работает для Renault)
    </div>
    <div class="card-body">
        <a href="{{ route('home.download-autopro') }}" class="btn btn-success">Экспортировать каталог</a>
    </div>
</div>

@endsection
