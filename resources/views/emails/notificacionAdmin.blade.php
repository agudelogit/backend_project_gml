<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Notificación</h1>
    <hr>
    <p>Un usuario nuevo se ha registrado, a continuación reporte por país</p>

    <table>
        <thead>
            <tr>
                <th>País</th>
                <th>Cantidad</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $paises[ $user->pais ] }}</td>
                <td>{{ $user->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>