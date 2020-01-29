@extends('admin.home')

@section('page')

<div class="card">
    <div class="card-header">
        Заказы
    </div>
    <div class="card-body">
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
                <tr>
                    <th scope="row">{{ $order->id ?? '-' }}</th>
                    <td>{{ $order->name ?? '-' }}, {{ $order->surname ?? '-' }}</td>
                    <td>{{ $order->phone ?? '-' }}</td>
                    <td>{{ $order->email ?? '-' }}</td>
                    <td>{{ $order->products()->sum('retail_price') ?? '-' }}грн.</td>
                    <td>{{ $order->status_id ?? '-' }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
</div>

@endsection
