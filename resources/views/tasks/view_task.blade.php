@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Aqui vês Tarefas</h2>

        <form method="POST" action="{{ route('tasks.update') }}">
            @csrf
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <label for="">Nome</label>
            <input type="text" name="name" value="{{ $task->name }}">
            <hr>
            <label for="">Descrição</label>
            <input type="text" name="description" value="{{ $task->description }}">
            <hr>
            <label for="">Data de Conclusão</label>
            <input type="date" name="due_at" value="{{ $task->due_at }}">
            <hr>
            <label for="">Nome do Responsável</label>
            <select name="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if ($user->id == $task->user_id) selected @endif>
                        {{ $user->name }}</option>
                @endforeach
            </select>
            <hr>
            <button type="submit">Actualizar</button>
        </form>
    </div>
@endsection
