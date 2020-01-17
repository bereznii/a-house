@extends('admin.home')

@section('page')

<div class="card">
  <div class="card-header">
    Запросы на обратные звонки
  </div>
  <div class="card-body">
      <table class="table table-bordered">
          <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Позиция</th>
              <th scope="col">Номер телефона</th>
          </tr>
          </thead>
          <tbody>
          <tr>
              <th scope="row">1</th>
              <td>-</td>
              <td>+380998887766</td>
          </tr>
          <tr>
              <th scope="row">2</th>
              <td>-</td>
              <td>+380998887766</td>
          </tr>
          <tr>
              <th scope="row">3</th>
              <td>-</td>
              <td>+380998887766</td>
          </tr>
          <tr>
              <th scope="row">4</th>
              <td>-</td>
              <td>+380998887766</td>
          </tr>
          <tr>
              <th scope="row">5</th>
              <td>-</td>
              <td>+380998887766</td>
          </tr>
          <tr>
              <th scope="row">6</th>
              <td>-</td>
              <td>+380998887766</td>
          </tr>
          </tbody>
      </table>
  </div>
</div>

@endsection
