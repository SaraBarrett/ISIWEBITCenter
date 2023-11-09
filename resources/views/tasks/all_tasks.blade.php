@extends('layouts.main')

@section('content')
    <h4>Cucu, carrega aquui as tarefas</h4>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Data de Conclusão</th>
                    <th scope="col">Pessoa Responsável</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->due_at }}</td>
                        <td>{{ $item->resname }}</td>
                        <td><a href="{{ route('tasks.view', $item->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('tasks.delete', $item->id) }}"type="button" class="btn btn-danger">Apagar</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
