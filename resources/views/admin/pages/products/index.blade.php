@extends('admin.home')

@section('page')

    <div class="card">
        <div class="card-header">
            Каталог
        </div>
        <div class="card-body">
            <p>* удалённые позиции не попадают в список</p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Модель</th>
                        <th scope="col">Складской код</th>
                        <th scope="col">Еврокод</th>
                        <th scope="col">Время импортирования</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $model)
                        <tr>
                            <td>{{ $model->id ?? '-' }}</td>
                            <td>{{ $model->model->name ?? '-' }}</td>
                            <td>{{ $model->barcode ?? '-' }}</td>
                            <td>{{ $model->stock_code ?? '-' }}</td>
                            <td style="white-space:nowrap">{{ $model->created_at ?? '-' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                {{  $products->onEachSide(1)->links() }}
        </div>
    </div>

@endsection
