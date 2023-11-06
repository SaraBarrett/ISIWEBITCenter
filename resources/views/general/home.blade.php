<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cheguei a casa</title>
</head>

<body>
    <h2>CHeguei a casa</h2>

    <ul>
        <a href="{{ route('users.all') }}">
            <li>Todos os Utilizadores</li>
        </a>
        <a href="{{ route('users.add') }}">
            <li>Adicionar Utilizador</li>
        </a>
    </ul>
    {{ $hello }}
</body>

</html>
