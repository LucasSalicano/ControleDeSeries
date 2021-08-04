@extends('layout')

@section('titulo')
    Cadastrar Séries
@endsection

@section('conteudo')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome">
            </div>
        <div class="col-md-2">
            <label for="qtd_temporadas">Nº Temporadas</label>
            <input type="number" class="form-control" name="temporadas">
        </div>
        <div class="col-md-2">
            <label for="qtd_temporadas">Ep. por temporadas</label>
            <input type="number" class="form-control" name="episodios">
        </div>
        <input type="submit" class="btn btn-primary mt-2" value="cadastrar">
        </div>
    </form>
    </div>
@endsection
