@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Aqui vês Tarefas</h2>

        <h6>Name: {{ $task->name }}</h6>
        <h6>Descrição:{{ $task->description }}</h6>
        <h6>Data de Conclusão:{{ $task->due_at }}</h6>
        <h6>Pessoa Responsável:{{ $task->resname }}</h6>
    </div>
@endsection
