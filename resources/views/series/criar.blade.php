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
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome">
        <input type="submit" class="btn btn-primary mt-2" value="cadastrar">
    </form>
    </div>
@endsection
