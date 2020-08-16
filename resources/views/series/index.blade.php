@extends('layout')

@section('cabecalho')
Séries
<script src="https://kit.fontawesome.com/56c372ddaf.js" crossorigin="anonymous"></script>
@endsection

@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])

@auth
<a href="{{ route('criar_serie') }}" class="btn btn-success mb-2">Adicionar</a>
@endauth

<ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

        <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
            <input type="text" class="form-control" value="{{ $serie->nome }}" id="text-nome-{{ $serie->id }}">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                    <i class="fas fa-check"></i>
                </button>
                @csrf
            </div>
        </div>

        <span class="d-flex">
            @auth
            <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                <i class="fas fa-edit"></i>
            </button>
            @endauth
            <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-1">
                <i class="fas fa-external-link-alt"></i>
            </a>
            @auth
            <form method="post" action="/series/{{ $serie->id }}" onsubmit="return confirm('Deseja remover a série {{ addslashes($serie->nome) }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
            @endauth
        </span>
    </li>
    @endforeach
</ul>

<script>
    function toggleInput(serieId) {
        const input = document.getElementById(`input-nome-serie-${serieId}`);
        const nome = document.getElementById(`nome-serie-${serieId}`);
        input.hidden = !input.hidden;
        nome.hidden = !nome.hidden;
    }

    function editarSerie(serieId) {
        let formData = new FormData();

        const nome = document.getElementById(`text-nome-${serieId}`).value;

        const token = document.getElementsByName(`_token`).item(0).value;

        formData.append('nome', nome);
        formData.append('_token', token);


        const url = `/series/${serieId}/editaNome`;
        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(() => {
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
        });
    }
</script>
@endsection