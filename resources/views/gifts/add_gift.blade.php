@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>olá, aqui podes adicionar Prendas</h2>
        <form method="POST" action="{{ route('gifts.store') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input name="name" value="{{ old('name') }}" type="text" required class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('name')
                    <p>Erro de nome</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Preço</label>
                <input required name="price" value="{{ old('price') }}" type="number" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                @error('price')
                    <p>Erro de price
                    @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Utilizador</label>
                <select name="user_id" id="pet-select">
                    <option value="">--Please choose an option--</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}"> {{ $item->name }}</option>
                    @endforeach
                </select>

                @error('user_id')
                    <p>Erro de user_id</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
