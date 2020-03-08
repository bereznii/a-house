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
                        <th scope="col">#</th>
                        <th scope="col">Полное название</th>
                        <th scope="col">Короткое название</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <th scope="row">{{ $model->model->id ?? '-' }}</th>
                            <td>{{ $model->model->name ?? '-' }}</td>
                            <td>{{ $model->model_name ?? '-' }}</td>
                            <td>
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
