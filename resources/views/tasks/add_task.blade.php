@extends('layouts.main')

@section('content')
    <div class="container">


        <h2>Aqui adicionas Tarefas</h2>



        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input name="name" value="" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
                @error('name')
                    Pf coloque um nome
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descrição</label>
                <input name="description" value="" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
                @error('description')
                    Pf coloque um descrição
                @enderror
            </div>
            <div>
                <label for="pet-select">Seleccione um utilizador:</label>
                <select name="user_id">
                    <option value="">--Please choose an option--</option>

                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach

                </select>

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
