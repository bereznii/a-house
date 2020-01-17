@extends('admin.home')

@section('page')

<div class="card">
  <div class="card-header">
    Наценка по поставщикам в %
  </div>
  <div class="card-body">
      <form>
          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Поставщик 1</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="0.00%">
              </div>
          </div>
          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Поставщик 2</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="0.00%">
              </div>
          </div>
          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Поставщик 3</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="0.00%">
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Обновить</button>
      </form>
  </div>
</div>

@endsection
