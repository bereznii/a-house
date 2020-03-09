@extends('admin.home')

@section('page')

    <div class="card">
        <div class="card-header">
            Названия моделей | Всего моделей: {{ $modelsCount }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" style="max-width: 100px;">#</th>
                        <th scope="col" style="max-width: 100px;">Полное название</th>
                        <th scope="col" style="max-width: 100px;">Короткое название</th>
                        <th scope="col" style="max-width: 100px;">На русском</th>
                        <th scope="col" style="max-width: 50px;">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <th scope="row" style="max-width: 100px;">{{ $model->model->id ?? '-' }}</th>
                            <td style="max-width: 100px;">{{ $model->model->name ?? '-' }}</td>
                            <td style="max-width: 100px;">{{ $model->model_name ?? '-' }}</td>
                            <td style="max-width: 100px;">{{ $model->cyrillic_name ?? '-' }}</td>
                            <td style="max-width: 50px;">
                                <a class="btn btn-primary" href="{{ route('models.edit', $model->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{  $models->links() }}
        </div>
    </div>

@endsection
