@extends('layouts.main')

@section('content')
    <div class=" container">
        <h2>Olá {{ Auth::user()->name }}</h2>


        @if (Auth::user()->user_type == 1)
            <div class="alert alert-info"> és um administrador</div>
        @endif

    </div>
@endsection
