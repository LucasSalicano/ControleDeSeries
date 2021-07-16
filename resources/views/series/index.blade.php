@extends('layout')

@section('titulo')
    Listar Séries
@endsection

@section('conteudo')
    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{$mensagem}}
        </div>
    @endif
    <a href="{{route('series_criar')}}" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ strtoupper($serie->nome) }}
                <form action="/series/remover/{{$serie->id}}" method="POST"
                      onsubmit="return confirm('Deseja realmente excluir ?')">
                    @csrf
                    <button class="btn btn-sm btn-danger"><i class="fas fa-minus-circle"></i></button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
