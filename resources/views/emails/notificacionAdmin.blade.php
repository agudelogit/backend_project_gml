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
    
    @foreach ($users as $user)
        <p>This is user {{ $user->nombre }}</p>
    @endforeach
</body>
</html>