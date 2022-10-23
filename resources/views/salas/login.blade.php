@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="true" href="{{ route('salas.index') }}">Nova Sala</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" href="{{ route('salas.login') }}">Entrar em uma sala</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Entrar</h5>
                    <form action="{{ route('salas.find') }}" method="POST">
                        @csrf
                        <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                            <div class="form-group">
                                <strong>Informe o código ou link da sala para entrar</strong>
                                <input type="text" name="uuid" value="{{ $uuid ?? null; }}" class="form-control" placeholder="código da sala">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                            <button type="submit" class="btn btn-primary">Entrar na sala</button>
                        </div>
                    </form>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger my-2">
                <strong>
                <ul class="my-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </strong>
            </div>
            @endif
        </div>
    </div>
@endsection