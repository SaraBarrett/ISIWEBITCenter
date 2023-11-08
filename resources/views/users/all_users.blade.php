@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Olá, sou todos os utilizadores</h2>

        <h5>Nome: {{ $cesaeInfo['name'] }}</h5>
        <h5>morada:{{ $cesaeInfo['address'] }}</h5>
        <h5>email:{{ $cesaeInfo['email'] }}</h5>
    </div>
@endsection
