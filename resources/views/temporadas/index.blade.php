@extends('layout')

@section('titulo')
    Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
            <li class="list-group-item">
               Temporada {{ strtoupper($temporada->numero) }}
            </li>
        @endforeach
    </ul>
@endsection
