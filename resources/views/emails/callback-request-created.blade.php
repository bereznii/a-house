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
            Новый запрос на обратный звонок! №{{ $request->id }}
        </p>
        <p>
            Ссылка: https://autoglasshouse.com.ua/admin/callbacks
        </p>
        <table>
            <tbody>
                <tr>
                    <td><b>Имя</b></td>
                    <td>{{ $request->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td><b>Номер телефона</b></td>
                    <td>{{ $request->phone ?? '-' }}</td>
                </tr>
                <tr>
                    <td><b>Комментарий</b></td>
                    <td>{{ $request->comment ?? '-' }}</td>
                </tr>
                <tr>
                    <td><b>Дата создания</b></td>
                    <td>{{ $request->created_at ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

</body>

</html>

