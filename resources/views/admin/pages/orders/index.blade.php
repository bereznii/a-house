@extends('admin.home')

@section('page')

<div class="card">
    <div class="card-header">
        Заказы
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="w-25 text-center" style="background-color: #b8daff;">Новый</td>
                    <td class="w-25 text-center" style="background-color: #c3e6cb;">Выполнен</td>
                    <td class="w-25 text-center" style="background-color: #ffeeba">Подтверждён</td>
                    <td class="w-25 text-center" style="background-color: #f5c6cb">Отменён</td>
                </tr>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Email</th>
                    <th scope="col">Сумма</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr style="background-color: {{ $order->getStatusColor() }}">
                        <th scope="row">{{ $order->id ?? '-' }}</th>
                        <td>{{ $order->name ?? '-' }} {{ $order->surname ?? '-' }}</td>
                        <td>{{ $order->phone ?? '-' }}</td>
                        <td>{{ $order->email ?? '-' }}</td>
                        <td>{{ $order->totalPrice ?? '-' }}грн.</td>
                        <td>{{ $order->statusName ?? '-' }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $orders->links() }}
    </div>
</div>

@endsection
