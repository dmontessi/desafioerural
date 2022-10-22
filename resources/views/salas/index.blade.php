@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" href="{{ route('salas.index') }}">Nova Sala</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('salas.login') }}">Entrar em uma sala</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nova Sala</h5>
                    <p class="card-text">Ao criar uma sala, você receberá um link para compartilhar com seus amigos</p>
                    <form action="{{ route('salas.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Criar nova sala</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection