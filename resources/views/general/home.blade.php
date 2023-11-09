@extends('layouts.main')

@section('content')
    <div class=" container">
        <h2>CHeguei a casa</h2>

        <ul>
            <a href="{{ route('users.all') }}">
                <li>Todos os Utilizadores</li>
            </a>
            <a href="{{ route('users.add') }}">
                <li>Adicionar Utilizador</li>
            </a>
            <a href="{{ route('tasks.all') }}">
                <li>Todos as Tarefas</li>
            </a>
        </ul>
        {{-- {{ $hello }} --}}
        <ul>
            @foreach ($weekDays as $day)
                <li> {{ $day }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <h4>Dados da Eva</h4>
        <h6>{{ $user->name }}</h6>
        <h6>{{ $user->password }}</h6>

        <ul>
            @foreach ($users as $item)
                <li>{{ $item->name }} - {{ $item->password }}</li>
            @endforeach
        </ul>

    </div>
@endsection
