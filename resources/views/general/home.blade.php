@extends('layouts.main')

@section('content')
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
@endsection
