<?php


namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Services\CriadorDeSerie;
use App\Serie;
use App\Services\RemovedorDeSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listar(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.criar', []);
    }

    public function criar(SeriesFormRequest $request)
    {
        $criadorDeSerie = new CriadorDeSerie();
        $criadorDeSerie->criarSerie(
            $request->nome,
            $request->temporadas,
            $request->episodios
        );

        $request->session()->flash('mensagem', 'Serie cadastrada com sucesso!');
        return redirect()->route('series_listar');
    }

    public function remove(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $serie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash("mensagem", "Serie $serie excluida com sucesso!");
        return redirect()->route('series_listar');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }

}
