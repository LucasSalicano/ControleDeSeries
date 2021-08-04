<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nome, int $temporadas, int $episodiosTemporada): Serie
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nome]);
        $this->criarTemporada($temporadas, $serie, $episodiosTemporada);
        DB::commit();

        return $serie;
    }

    private function criarTemporada($qtdTemporadas, $serie, $episodiosTemporada): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criarEpisodios($episodiosTemporada, $temporada);
        }
    }

    private function criarEpisodios($episodiosTemporada, $temporada): void
    {
        for ($j = 1; $j <= $episodiosTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
