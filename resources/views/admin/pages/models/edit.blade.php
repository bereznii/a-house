@extends('admin.home')

@section('page')

    <div class="card">
        <div class="card-header">
            Модель #{{ $model->model->id }}
        </div>
        <div class="card-body">
            <form action="{{ route('models.update', ['model' => $model->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="fullName">Полное название модели</label>
                    <input type="text" class="form-control" name="fullName" id="fullName" value="{{ $model->model->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="shortName">Короткое название модели</label>
                    <input type="text" class="form-control" name="shortName" id="shortName" value="{{ $model->model_name }}">
                </div>
                <div class="form-group">
                    <label for="cyrillicName">Короткое название модели</label>
                    <input type="text" class="form-control" name="cyrillicName" id="cyrillicName" value="{{ $model->cyrillic_name }}">
                </div>

                <button class="btn btn-success btn-lg btn-block" type="submit">Обновить модель</button>
            </form>
        </div>
    </div>

@endsection
