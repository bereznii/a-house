@extends('admin.home')

@section('page')

<div class="card">
  <div class="card-header">
    Запросы на обратные звонки
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Имя</th>
                      <th scope="col">Номер телефона</th>
                      <th scope="col">Время создания</th>
                      <th scope="col">Комментарий</th>
                      <th scope="col">Перезвонил</th>
                  </tr>
              </thead>
              <tbody>
              @foreach($records as $record)
                  <tr class="@if($record->is_called) table-success @else table-danger @endif">
                      <th scope="row">{{ $record->id ?? '-' }}</th>
                      <td>{{ $record->name ?? '-' }}</td>
                      <td>{{ $record->phone ?? '-' }}</td>
                      <td>{{ $record->comment ?? '-' }}</td>
                      <td>{{ $record->created_at ?? '-' }}</td>
                      <td style="width:  10%">
                          <input type="checkbox" class="change_status" data-id="{{ $record->id ?? '-' }}" @if($record->is_called) checked @endif>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
      </div>
      {{ $records->links() }}
  </div>
</div>
@endsection
