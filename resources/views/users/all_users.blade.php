@extends('layouts.main')

@section('content')
    <div class="container">

        <h2>Olá, sou todos os utilizadores</h2>
        {{--
        <h5>Nome: {{ $cesaeInfo['name'] }}</h5>
        <h5>morada:{{ $cesaeInfo['address'] }}</h5>
        <h5>email:{{ $cesaeInfo['email'] }}</h5> --}}
        <form method="GET">
            <select name="user_id" id="" onchange="this.form.submit()">
                <option value="">All Users</option>
                @foreach ($allUsers as $item)
                    <option @if ($item->id == request()->query('user_id')) selected @endif value="{{ $item->id }}">{{ $item->name }}
                    </option>
                @endforeach
            </select>
        </form>
        <form method="GET">
            <input type="text" placeholder="Escreva o Email ou Nome" name="search"
                value="{{ request()->query('search') }}">
            <button>Procurar</button>
        </form>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">Morada</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td><img width="50px" height="50px"
                                src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/nophoto.jpg') }}"
                                alt=""></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>

                        @auth
                            <td><a href="{{ route('users.view', $user->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('users.delete', $user->id) }}"type="button" class="btn btn-danger">Apagar</a>
                            </td>
                        @endauth
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
