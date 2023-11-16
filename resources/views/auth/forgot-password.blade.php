@extends('layouts.main')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" value="" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Recuperar Pass</button>
        </form>
    </div>
@endsection
