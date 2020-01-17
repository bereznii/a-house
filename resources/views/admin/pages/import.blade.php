@extends('admin.home')

@section('page')

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Импорт каталога:</h5>
      <form>
          <div class="form-group">
              <input type="file" class="form-control-file" id="exampleFormControlFile1">
              <br>
              <button type="submit" class="btn btn-primary">Импортировать</button>
          </div>
      </form>
  </div>
</div>

@endsection
