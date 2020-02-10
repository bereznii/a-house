<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        table, th, td {
            border: 1px solid lightgray;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>

<body>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <p>
            Новый заказ! №{{ $order->id }}
        </p>
        <p>
            Ссылка: {{ url("admin/orders/{$order->id}/edit") }}
        </p>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><b>Имя</b></td>
                    <td>{{ $order->name }}</td>
                </tr>
                <tr>
                    <td><b>Фамилия</b></td>
                    <td>{{ $order->surname }}</td>
                </tr>
                <tr>
                    <td><b>Почта</b></td>
                    <td>{{ $order->email }}</td>
                </tr>
                <tr>
                    <td><b>Телефон</b></td>
                    <td>{{ $order->phone }}</td>
                </tr>
                <tr>
                    <td><b>Адрес</b></td>
                    <td>{{ $order->address }}</td>
                </tr>
                <tr>
                    <td><b>Страна</b></td>
                    <td>{{ $order->country }}</td>
                </tr>
                <tr>
                    <td><b>Город</b></td>
                    <td>{{ $order->city }}</td>
                </tr>
                <tr>
                    <td><b>Комментарий</b></td>
                    <td>{{ $order->comment }}</td>
                </tr>
                <tr>
                    <td><b>Обратный звонок</b></td>
                    <td>@if($order->need_callback) Да @else Нет @endif</td>
                </tr>
                <tr>
                    <td><b>Дата создания</b></td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            </tbody>
        </table>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

</body>

</html>

