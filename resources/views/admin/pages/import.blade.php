@extends('admin.home')

@section('page')

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Импорт каталога:</h5>
      <form action="{{ route('home.import.action') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <input type="file" class="form-control-file" name="catalog" id="exampleFormControlFile1">
              <br>
              <button type="submit" class="btn btn-primary">Импортировать</button>
          </div>
      </form>
      @if(isset($countedRows))
          <p>Обновлено
              {{ $countedRows['makeCount'] ?? '-' }} марок,
              {{ $countedRows['modelCount'] ?? '-' }} моделей,
              {{ $countedRows['productCount'] ?? '-' }} позиций
          </p>
      @endif
  </div>
</div>

@endsection
