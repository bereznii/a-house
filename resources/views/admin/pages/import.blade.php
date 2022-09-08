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
      @if(isset($importErrors))
          <div class="alert alert-danger" role="alert">
              <p> Ошибка при импорте. Обнаружена неправильная ячейка
                  "{{ $importErrors['badValue'] ?? '-' }}". Список существующих типов:
                  {{ implode(', ', array_keys($importErrors['existingTypes'] ?? [])) }}. Тип в ячейке
                  "{{ $importErrors['badType'] ?? '-' }}".
              </p>
          </div>
      @elseif(isset($countedRows))
          <p>Обновлено
              {{ $countedRows['makeCount'] ?? '-' }} марок,
              {{ $countedRows['modelCount'] ?? '-' }} моделей,
              {{ $countedRows['productCount'] ?? '-' }} позиций.
              Артикул добавлен для {{ $countedRows['vendorCodeCount'] ?? '-' }} позиций.
          </p>
      @endif
  </div>
</div>

@endsection
