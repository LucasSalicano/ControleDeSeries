@extends('layout')

@section('titulo')
    Episódios
@endsection

@section('conteudo')
    <form action="/temporadas/{{$temporadaId}}/episodios/assistir" method="post">
        @csrf
        <ul class="list-group">
            @foreach($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episodio {{ strtoupper($episodio->numero) }}
                    <input type="checkbox" name="episodios[]" value="{{$episodio->id}}">
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">salvar</button>
    </form>
@endsection
