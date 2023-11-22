@extends('layouts.main')


@section('content')
    <div class="container">
        <h1>Todas as prendas</h1>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th>Detentor da Prenda</th>
                    <th>Diferença</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gifts as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->giftowner }}</td>
                        <td>{{ $item->difference }}</td>
                        <td><a href="{{ route('gifts.view', $item->id) }}" class="btn btn-info">Ver / Editar</a></td>
                    </tr>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection