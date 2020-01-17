@extends('admin.home')

@section('page')

<div class="card">
  <div class="card-header">
    User activity
  </div>
  <div class="card-body">
      <table class="table table-bordered">
          <thead>
          <tr>
              <th scope="col">IP</th>
              <th scope="col">Позиция</th>
              <th scope="col">Время</th>
          </tr>
          </thead>
          <tbody>
          <tr>
              <th scope="row">0.0.0.1</th>
              <td>-</td>
              <td>12-12-2019 14:30:22</td>
          </tr>
          <tr>
              <th scope="row">0.0.0.2</th>
              <td>-</td>
              <td>12-12-2019 14:30:22</td>
          </tr>
          <tr>
              <th scope="row">0.0.0.3</th>
              <td>-</td>
              <td>12-12-2019 14:30:22</td>
          </tr>
          <tr>
              <th scope="row">0.0.0.4</th>
              <td>-</td>
              <td>12-12-2019 14:30:22</td>
          </tr>
          <tr>
              <th scope="row">0.0.0.5</th>
              <td>-</td>
              <td>12-12-2019 14:30:22</td>
          </tr>
          <tr>
              <th scope="row">0.0.0.6</th>
              <td>-</td>
              <td>12-12-2019 14:30:22</td>
          </tr>
          </tbody>
      </table>
  </div>
</div>

@endsection
