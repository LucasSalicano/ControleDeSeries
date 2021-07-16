<?php


namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

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

    public function store(SeriesFormRequest $request)
    {
        Serie::create($request->all());
        $request->session()->flash('mensagem', 'Serie cadastrada com sucesso!');

        return redirect()->route('series_listar');
    }

    public function remove(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem','Serie excluida com sucesso!');
        return redirect()->route('series_listar');
    }

}
