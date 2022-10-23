@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card" style="height: 80vh">
            <div class="card-header text-center">
                <h5 class="card-title">Videos</h5>
            </div>
            <div class="card-body p-0" id="videoslist">
                @include('videos.porsala')
            </div>
            <div class="card-footer d-flex justify-content-center flex-column">
                <div class="d-grid">
                    <button class="btn btn-danger align-self-center" type="button" data-bs-toggle="modal" data-bs-target="#ModalVideo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                        </svg>
                        Adicionar vídeo do Youtube
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card text-center" style="height: 80vh">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="{{ route('salas.index') }}">Sua Sala</a>
                    </li>
                </ul>
            </div>
            @if (count($sala->videos))
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/{{ $sala->videos[0]->id_youtube() }}" allowfullscreen></iframe>
            </div>
            @else
            <div class="card-body d-flex justify-content-center flex-column">
                <h3 class="card-title">Esta sala está vazia</h3>
                <h6 class="card-title">Para iniciar, adicione um novo vídeo na lista de reprodução</h6>
            </div>
            @endif
            <div class="card-footer text-muted">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ url('/') . '/sala/' . $sala->uuid }}" disabled id="LinkSala">
                    <button class="btn btn-primary" type="button" data-bs-toggle="tooltip" title="Copiar link da sala" onclick="copy(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="ModalVideo">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('videos.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar vídeo do Youtube</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                            </svg>
                        </span>
                        <input type="text" name="url" class="form-control" placeholder="https://www.youtube.com/watch?v=sn19xvfoXvk">
                        <input type="hidden" name="sala_id" value="{{ $sala->id }}">
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="module">
    setInterval(function() {
        $('#videoslist').load("{{ url('/') }}/videos/porsala/{{ $sala->id }}");
    }, 30 * 1000);
</script>

@if ($errors->any())
<script type="module">
    var myModal = new bootstrap.Modal(document.getElementById("ModalVideo"), {});
    document.onreadystatechange = function() {
        myModal.show();
    };
</script>
@endif
@endsection