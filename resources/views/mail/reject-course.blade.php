<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Curso rechazado</h1>
    <h3>Nombre del Curso:</h3>
    <h2>{{$course->title}}</h2>

    <h2>Motivo del Rechazo:</h2>
    {!!$course->observation->body!!}
</body>
</html>