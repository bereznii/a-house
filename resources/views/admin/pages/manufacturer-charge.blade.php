@extends('admin.home')

@section('page')

<div class="card">
  <div class="card-header">
    Наценка по поставщикам в %
  </div>
  <div class="card-body">
      <form>
          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">WS</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="18%" disabled>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">WS SafeGlass</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="34.88%" disabled>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">RW</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="25.17%" disabled>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">RW SafeGlass</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="34.87%" disabled>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">BO</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="34.47%" disabled>
              </div>
          </div>
          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">GU</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="34.47%" disabled>
              </div>
          </div>
          <button type="submit" class="btn btn-primary" disabled>Обновить</button>
      </form>
  </div>
</div>

@endsection
