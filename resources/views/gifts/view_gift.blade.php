@extends('layouts.main')
@section('content')
    <div class="container">
        <h2>ver prenda</h2>
        <form method="POST" action="{{ route('gifts.update_p') }}">
            @csrf
            <input type="hidden" value="{{ $gift->id }}" name="id">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input name="name" value="{{ $gift->name }}" type="text" required class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('name')
                    <p>Erro de nome</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Preço</label>
                <input required name="price" value="{{ $gift->estimated_price }}" type="number" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                @error('price')
                    <p>Erro de price
                    @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Preço Gasto</label>
                <input required name="real_cost" value="{{ $gift->real_cost }}" type="number" class="form-control"
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
                    @foreach ($users as $user)
                        <option @if ($user->id == $gift->user_id) selected @endif value="{{ $user->id }}">
                            {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
